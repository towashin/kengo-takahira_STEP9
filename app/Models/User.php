protected $fillable = [
    'username',
    'name',
    'kana',
    'email',
    'password',
];

public function purchases()
{
    return $this->hasMany(Purchase::class);
}