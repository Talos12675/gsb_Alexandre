<?php

namespace Tests\Feature;

use App\Models\Visiteur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JournalConnexionTest extends TestCase
{
    use RefreshDatabase;

    public function test_successful_login_records_journal_connexion()
    {
        // create the visiteur to authenticate
        $visiteur = Visiteur::create([
            'VIS_MATRICULE' => 'test123',
            'VIS_NOM' => 'Test',
            'Vis_PRENOM' => 'User',
            'VIS_PASSWORD' => bcrypt('secret'),
        ]);

        $response = $this->post('/login', [
            'matricule' => 'test123',
            'password' => 'secret',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('journal_connexions', [
            'idUtilisateur' => 'test123',
            'adresseIP' => '127.0.0.1',
        ]);
    }

    public function test_journal_connexions_index_is_accessible_for_authenticated_user()
    {
        session(['loggedin' => true, 'is_admin' => true, 'user_id' => 1, 'name' => 'admin']);

        $response = $this->get('/journal-connections');

        $response->assertStatus(200);
    }

    public function test_visiteur_can_view_praticiens_and_medicaments_but_not_admin_actions()
    {
        $visiteur = Visiteur::create([
            'VIS_MATRICULE' => 'visitor123',
            'VIS_NOM' => 'Visitor',
            'Vis_PRENOM' => 'User',
            'VIS_PASSWORD' => bcrypt('password123'),
        ]);

        $this->post('/login', [
            'matricule' => 'visitor123',
            'password' => 'password123',
        ])->assertRedirect(route('dashboard'));

        $this->get('/dashboard')->assertStatus(200);

        $this->get('/praticiens')->assertStatus(200);
        $this->get('/medicaments')->assertStatus(200);

        $this->get('/praticiens/create')->assertRedirect(route('dashboard'));
        $this->get('/medicaments/create')->assertRedirect(route('dashboard'));

        $this->get('/praticiens')->assertDontSee('Nouveau Praticien');
        $this->get('/medicaments')->assertDontSee('Nouveau Médicament');
    }
}
