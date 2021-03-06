
<?php require "header.php"; ?>
<?php require "bootstrap.php"; ?>

<?php
$categories_beverage = new CategoriesBeverage();
$beverages = new Beverage();
$allCategories = $categories_beverage->all();

$id_beverage = isset($_GET['id_beverage']) ? $_GET['id_beverage'] : "" ;


$beverage = $beverages->find($id_beverage);


if(!isset($_SESSION['email'])){
    header("location:login.php");
}

?>
<body style="background-color: lightblue;">

<style>
    .admin_slika{

    }
    @media only screen and (max-width: 767px){
        .admin_slika{
            width:100%;
        }
    }
</style>

<a class="btn btn-info mt-5 btn btn-info" href="index.php#beverage">Vrati se nazad</a>


<div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
        <div class="text-center m-auto" style="width: 200px;"><img class="rounded" style="width:100%;" src="admin_image.jpg" alt="">
            <?php if(isset($_SESSION['email'])) : ?>
                <h5 class=" btn btn-success mt-3 disabled"><?php echo auth()->firstname." ".auth()->lastname; ?></h5>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 p-4">
        <div class=" card card-primary mt-5 ml-5 admin_slika m-auto">
            <div class="card-header">
                <h3 class="card-title">Izmena pića</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="BeverageController.php?id=<?php echo $id_beverage; ?> " method="post">

                <div class="card-body">

                    <div class="form-group">
                        <b><label for="name">Ime pića</label></b>
                        <input class="form-control" type="text" name="name" value="<?php if(!empty($id_beverage)) echo $beverage->name; ?>"  required>
                        <b><span class="text-danger"><?php if(isset($errors['name_error'])) echo $errors['name_error']; ?></span></b>
                    </div>

                    <div class="form-group">
                        <b><label for="ingredients">Sastojci</label></b>
                        <input class="form-control" type="text" name="ingredients" value="<?php if(!empty($id_beverage)) echo $beverage->ingredients; ?>" >

                    </div>

                    <div class="form-group">
                        <b><label for="price">Cena</label></b>
                        <input type="text" name="price" class="form-control" value="<?php if(!empty($id_beverage)) echo $beverage->price ?>"  required>
                        <b><span class="text-danger"><?php if(isset($errors['price_error'])) echo $errors['price_error']; ?></span></b>

                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit" name="izmeni_pice" class="btn btn-primary">Izmeni</button>
                </div>

            </form>
        </div>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>

</div>




</body>

</html>