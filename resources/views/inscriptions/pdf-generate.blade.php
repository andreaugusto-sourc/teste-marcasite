<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Inscritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="font-size: 12px;">
    <h2 style="text-align: center">Inscritos</h2>

    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #adb5bd;">
                <th style="border: 1px solid #ccc;">Inscrito</th>
                <th style="border: 1px solid #ccc;">Data de inscrição</th>
                <th style="border: 1px solid #ccc;">Categoria</th>
                <th style="border: 1px solid #ccc;">CPF</th>
                <th style="border: 1px solid #ccc;">E-mail</th>
                <th style="border: 1px solid #ccc;">Status</th>
                <th style="border: 1px solid #ccc;">Total</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inscriptions as $inscription)
                <tr>
                    <td style="border: 1px solid #ccc; border-top: none;">{{$inscription->user->name}}<</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{date( 'd/m/Y' , strtotime($inscription->created_at))}}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{$inscription->category}}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{$inscription->user->cpf}}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">{{$inscription->email}}</td>
                    <td style="border: 1px solid #ccc; border-top: none;">Não foi feito</td>
                    <td style="border: 1px solid #ccc; border-top: none;">Não foi feito</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum inscrito encontrado!</td>
                </tr>
            @endforelse
        </tbody>

    </table>
</body>

</html>
