<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="styles/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    require 'require.php';

    use TWA\JednoduchePriklady\breadcrumb;

    /* BREADCRUMB */

    $bc = new breadcrumb\Breadcrumb();
    $bc->addItem(new breadcrumb\Item('Produkty', 'index.php'));
    $bc->addItem(new breadcrumb\Item('Fotoaparáty', 'index.php'));
    $bc->addItem(new breadcrumb\Item('Digitální zrcadlovky', 'index.php'));
    $bc->addItem(new breadcrumb\Item('Fotoaparát XYZ'));
    echo $bc;
    $bc->goBack();
    echo $bc;

    use TWA\JednoduchePriklady\table;

    /* TABLE */

    $table = new table\Table('Produkty');
    $table->addColumn(new table\Column('Název'));
    $table->addColumn(new table\Column('Barva', 'Color'));
    $table->addColumn(new table\Column('Cena', 'Price'));
    $table->addColumn(new table\Column('Email', 'Mail'));
    $table->addRowData(array('A', '#0F0', 123.50, 'a@b.cz'));
    $table->addRowData(array('B', '#00F', 45456, 'c@d.cz'));
    echo $table;
    ?>
</body>

</html>