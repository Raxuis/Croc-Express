<h3>Messages reçus</h3>

<table>
    <tr>
        <td><b>ID</b></td>
        <td><b>Utilisateur</b></td>
        <td><b>Titre</b></td>
        <td><b>Contenu</b></td>
    </tr>
    <?php foreach ($allMessages as $message) { ?>
        <?php $currentUser = $userManager->getOne($message['user_id']); ?>
        <tr>
            <td><?= $message['id'] ?></td>
            <td><?= $currentUser['firstname'] ?></td>
            <td><?= $message['title'] ?></td>
            <td><?= $message['content'] ?></td>
        </tr>
    <?php } ?>

</table>