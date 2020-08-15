<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = '1';
        foreach ($unduh as $u) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $u->username; ?></td>
                <td><?= $u->password; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>