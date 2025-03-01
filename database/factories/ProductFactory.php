<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sellingPrice = $this->faker->randomFloat(2, 10, 1000); // Preço original

        return [
            'brand_id' => $this->faker->randomElement([2, 3]), // Marca (2 ou 3)
            'category_id' => $this->faker->numberBetween(1, 10), // Categoria (1 a 4)
            'subcategory_id' => $this->faker->numberBetween(3, 5), // Subcategoria (3 a 5)
            'product_name' => $this->faker->words(3, true), // Nome do produto
            'product_slug' => function (array $attributes) {
                // Gera o slug a partir do nome do produto
                return \Str::slug($attributes['product_name']);
            },
            'product_code' => $this->faker->unique()->numerify('P###'), // Código único
            'product_qty' => $this->faker->numberBetween(10, 100), // Quantidade
            'product_tags' => $this->faker->words(3, true), // Tags separadas por vírgula
            'product_size' => $this->faker->optional()->randomElement(['S', 'M', 'L', 'XL']), // Tamanhos
            'product_color' => $this->faker->optional()->randomElement(['Red', 'Blue', 'Green', 'Black']), // Cores
            'selling_price' => $sellingPrice, // Preço original
            'discount_price' => $this->faker->optional(0.7, null)->randomFloat(2, 5, $sellingPrice - 1), // Preço com desconto
            'short_descp' => $this->faker->sentence, // Descrição curta
            'long_descp' => $this->faker->paragraph, // Descrição longa
            'vendor_id' => $this->faker->optional(0.9, null)->numberBetween(3, 12), // IDs de vendedores (3 a 12 ou nulo)
             'status' => 1, // Status padrão
        ];
    }
}
