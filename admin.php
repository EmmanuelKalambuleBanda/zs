<?php
$page_title = 'Admin Home Page';
require_once('includes/load.php');
page_require_level(1);

$c_categorie     = count_by_id('categories');
$c_product       = count_by_id('products');
$c_sale          = count_by_id('sales');
$c_user          = count_by_id('users');
$products_sold   = find_higest_saleing_product('10');
$recent_products = find_recent_product_added('5');
$recent_sales    = find_recent_sale_added('5');

$low_quantity_products = get_products_low_quantity_percentage(20);
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">ZAITHWA SHOP</h1>
</div>

<!-- Content Row -->
<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              Users</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_user['total']; ?> </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Categories</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_categorie['total']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Products</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_product['total']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Sales</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $c_sale['total']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
<?php foreach ($low_quantity_products as $product) : ?>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $product['name']; ?></div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <?php
                $percentage = round(calculate_quantity_percentage($product['quantity'], $product['init_quantity']), 2);
                ?>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $percentage; ?>%</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

</div>
<div class="row">
    <div class="col-lg-6 mb-4">
        <!-- Panel for Highest Selling Products -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Highest Selling Products</span>
                </strong>
            </div>
            <div class="panel-body">
                <table id="table-highest-selling-products" class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Total Sold</th>
                            <th>Total Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products_sold as $product_sold) : ?>
                            <tr>
                                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                                <td><?php echo (int)$product_sold['totalQty']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <!-- Panel for Recent Sales -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>RECENT SALES</span>
                </strong>
            </div>
            <div class="panel-body">
                <table id="table-recent-sales" class="tabletable-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Product Name</th>
                            <th>Date</th>
                            <th>Total Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_sales as $recent_sale) : ?>
                            <tr>
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td>
                                    <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
                                        <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                                    </a>
                                </td>
                                <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                                <td>MWK<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <!-- Panel for Recently Added Products -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Recently Added Products</span>
                </strong>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <?php foreach ($recent_products as $recent_product) : ?>
                        <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo (int)$recent_product['id']; ?>">
                            <div class="media">
                                <div class="media-left">
                                    <?php if ($recent_product['media_id'] === '0') : ?>
                                        <img class="media-object img-circle" src="uploads/products/no_image.png" alt="" style="max-width: 64px;">
                                    <?php else : ?>
                                        <img class="media-object img-circle" src="uploads/products/<?php echo $recent_product['image']; ?>" alt="" style="max-width: 64px;">
                                    <?php endif; ?>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo remove_junk(first_character($recent_product['name'])); ?></h4>
                                    <span class="label label-warning">MWK<?php echo (int)$recent_product['sale_price']; ?></span>
                                    <span class="list-group-item-text"><?php echo remove_junk(first_character($recent_product['categorie'])); ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="row">

</div>

<?php include_once('layouts/footer.php'); ?>

