<h3>Messages reçus</h3>

<table class="table-cart">
    <thead>
        <th>ID</th>
        <th>Utilisateur</th>
        <th>Titre</th>
        <th>Contenu</th>
    </thead>
    <?php foreach ($allMessages as $message) { ?>
        <?php $currentUser = $userManager->getOne($message['user_id']); ?>
        <tr>
            <td>
                <?= $message['id'] ?>
            </td>
            <td>
                <?= $currentUser['firstname'] ?>
            </td>
            <td>
                <?= $message['title'] ?>
            </td>
            <td>
                <?= htmlspecialchars($message['content']) ?>
            </td>
        </tr>
    <?php } ?>

</table>