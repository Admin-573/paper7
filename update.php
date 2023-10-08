<?php
    include 'init.php';
    $getID = $_GET[$pid];
    $sql = "select * from $product where $pid = $getID";
    $queryExe = mysqli_query($con,$sql);
    $data = mysqli_num_rows($queryExe);
    $row = mysqli_fetch_array($queryExe);
    ?>
<html>
    <head>
        <title>
            Beauty Parlor
        </title>
    </head>
    <body>
        <center>
            <form action="" method="post">
                <h1>Update Beauty Products</h1>
                <table>
                    <tr>
                        <td>Product ID</td>
                        <td><input type="number" name="pid" disabled value="<?php echo $row[$pid] ?>"></td>   
                    </tr>
                    <tr>
                        <td> Update Product Name</td>
                        <td><input type="text" name="pname" value="<?php echo $row[$pname] ?>"></td>   
                    </tr>
                    <tr>
                        <td>Update Product Category</td>
                        <td>
                            <select name="pcategory">
                                <option name="skin_care">Skin Care</option>
                                <option name="make_up">Make Up</option>
                                <option name="hair_care">Hair Care</option>
                                <option name="daily">Daily Essential</option>
                                <option name="frag">Fragrances</option>
                            </select>
                        </td>   
                    </tr>
                    <tr>
                        <td>Update Description</td>
                        <td><input type="text" name="pdes" value="<?php echo $row[$pdes]; ?>"></td>   
                    </tr>
                    <tr>
                        <td>Update Company</td>
                        <td><input type="text" name="pcompany" value="<?php echo $row[$pcompany]; ?>"></td>   
                    </tr>
                    <tr>
                        <td>Update Price</td>
                        <td><input type="number" name="pprice" value="<?php echo $row[$pprice]; ?>"></td>   
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btn_upd" value="Update Product"></td>   
                    </tr>
                </table>
            </form>
        </center>   
    </body>   
</html>
<?php
    include "init.php";

    if (isset($_POST['btn_upd']))
    {
        $getID = $_GET[$pid];
        $product_name = $_POST[$pname];
        $product_category = $_POST[$pcategory];
        $product_des = $_POST[$pdes];
        $product_company = $_POST[$pcompany];
        $product_price = $_POST[$pprice];
    
        $sql = "update $product set $pname='$product_name',
                $pcategory='$product_category' , 
                $pdes='$product_des', 
                $pcompany='$product_company', 
                $pprice='$product_price' 
                where $pid = $getID";
        print_r($sql);
        $queryExe=mysqli_query($con,$sql);
        if(!$queryExe)
        {
            ?> 
                <script>
                    alert("Product Not Updated")
                </script>
            <?php
        }
        else
        {
            ?> 
                <script>
                    alert("Product Updated")
                    window.open("http://localhost/paper7/index.php","_self")
                </script>
            <?php
        }
    } 
?>