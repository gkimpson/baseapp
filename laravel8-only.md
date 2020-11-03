// User Model
public function tenant() { return $this->belongsTo(Tenant::class); }

// User factory
return [ /* ... */ 'tenant_id' => Tenant::factory(), ];

// Tenant Model
public function user() { return $this->hasMany(User::class); }

// Tenant Factory
return [ 'name' => $this->faker->company, ];

/* tinker commands */

// creates 10 users for 1 tenant:
App\Models\User::factory()->for(Tenant::factory())->count(10)->create();

// creates 10 users and 10 tenants
App\Models\User::factory()->count(10)->create();

// create 10 users attached to tenant 1
App\Models\User::factory()->count(10)->create(['tenant_id' => 1]);

shortcut...
User::factory()->create();
