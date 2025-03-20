<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .checkout-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .checkout-container h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .checkout-btn {
            width: 100%;
            background: #28a745;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
        }
        .checkout-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="checkout-container">
    <h2>Finalizar Compra</h2>

    <form action="<?php echo e(route('pay')); ?>" method="post">

        <?php echo csrf_field(); ?>
        <label for="name">Valor a liquidar</label>
        <h2>
            <?php echo e(number_format($cart->total, 2, '.', ' ') . ' MZN'); ?>


        </h2>

        <input type="hidden" id="amount" value="<?php echo e($cart->total); ?>" readonly disabled>
        <label for="name">Nome Completo</label>
        <input type="text" id="name" placeholder="Digite seu nome" required>

        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Digite seu email" required>

        <label for="address">Endereço</label>
        <input type="text" id="address" placeholder="Digite seu endereço" required>

        <label for="payment">Método de Pagamento</label>
        <select id="payment">
            <option value="credit">Cartão de Crédito</option>
            <option value="debit">Cartão de Débito</option>
            <option value="paypal">PayPal</option>
        </select>

        <button type="submit" class="checkout-btn">Finalizar Compra</button>
    </form>
</div>

</body>
</html><?php /**PATH C:\Users\Cuata\Desktop\ALY\starshop\resources\views/frontend/product/checkout.blade.php ENDPATH**/ ?>