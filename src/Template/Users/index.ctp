<h1>Benutzer</h1>
<table>
    <tr>
        <th>Username</th>
        <th>Role</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->role) ?></td>
        </tr>
    <?php endforeach; ?>
</table>