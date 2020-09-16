<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(AdminsTableSeeder::class);
        $this->call(AdvertsTableSeeder::class);
        $this->call(AimlTableSeeder::class);
        $this->call(AimlUserdefinedTableSeeder::class);
        $this->call(AuthAppsTableSeeder::class);
        $this->call(AuthTokensTableSeeder::class);
        $this->call(BotpersonalityTableSeeder::class);
        $this->call(BotsTableSeeder::class);
        $this->call(ClientPropertiesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ConversationLogTableSeeder::class);
        $this->call(EntriesTableSeeder::class);
        $this->call(MyprogramoTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
        $this->call(NodesTableSeeder::class);
        $this->call(SearchesTableSeeder::class);
        $this->call(SpellcheckTableSeeder::class);
        $this->call(SraiLookupTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(UndefinedDefaultsTableSeeder::class);
        $this->call(UnknownInputsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(WordcensorTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
