<?php


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Services\Factories\RoleFactory;
use App\Services\Factories\UserFactory;

class UserTableSeeder extends Seeder {

    protected $roleFactory;

    protected $userFactory;


    public function __construct(RoleFactory $roleFactory, UserFactory $userFactory)
    {
        $this->roleFactory = $roleFactory;
        $this->userFactory = $userFactory;
    }


    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();

        $adminRole = $this->roleFactory->make( array( 'key' => 'admin' ) );

        /** @var User $user1 */
        $user1 = $this->userFactory->make(
            array(
                'first_name'            => 'Jan',
                'last_name'             => 'Oris',
                'email'                 => 'jan.oris@ixudra.be',
                'password'              => 'FooBar',
            )
        );

        $user1->roles()->sync( array( $adminRole->id ) );
    }

}
