<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nome = $this->faker->unique()->sentence();
        return [
            'nome' => $nome,
            'descricao' => $this->faker->paragraph(),
            'preco' => $this->faker->randomNumber(2),
            'slug' => Str::slug($nome), // O slug será gerado a partir do nome
            'imagem' => $this->faker->imageUrl(400, 400),
            'id_user' => User::pluck('id')->random(), // Usando o pluck() para extrair uma informação da tabela, que neste caso é o id
            'id_categoria' => Categoria::pluck('id')->random(),
        ];
    }
}
