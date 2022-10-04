<?php
$num = $_POST['num'];
$unit = 1 ?>

<table border="1px">
    <?php for ($i = 1; $i <= $Num; $i++) : ?>
    <tr>
        <?php for ($j = 1; $j <= $Num; $j++) : ?>

        <?php if ($unit == $j) : ?>
        <td>1</td>
        <?php else : ?>
        <td>0</td>
        <?php endif; ?>
        <?php endfor; ?>
        <?php $unit = $unit + 1; ?>
    </tr>
    <?php endfor; ?>
</table>