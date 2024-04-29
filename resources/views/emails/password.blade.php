<!DOCTYPE html>
<html>

<head>
    <title>Recuperação de Senha</title>
</head>

<body>
    <h1>Recuperação de Senha</h1>
    <p>Olá {{ $user->name }},</p>
    <p>Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.</p>
    <p>Clique no link abaixo para redefinir sua senha:</p>
    <p><a href="{{ $resetLink }}">Redefinir Senha</a></p>
    <p>Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.</p>
</body>

</html>
