<?php
			
				$buying_products = mysqli_query($link,"select product_id, amount, price, total_price from buying_products where session = '$session' and buy = '0'");
				
			
            if (mysqli_num_rows($buying_products) != 0) {
                ?>
			<table id ="tabla" >
            <Tr>
            <Th>Name</Th><Th>Description</Th><Th>Price</Th><Th>Amount</Th><Th>Total price</Th><Th></Th>
            </Tr>
				<?php
                
					while($buying_products_array = mysqli_fetch_array($buying_products))
					{
                        $Bproduct_id = $buying_products_array[0];
                        $emaitza = mysqli_query($link,"select name, description from products where product_id = $Bproduct_id");
                        $emaitza = mysqli_fetch_array($emaitza);

						printf("</td><td>%s</td><td>%s</td>",$emaitza["name"],$emaitza["description"]);
                        printf("<td>%.2f€</td><td>%d</td><td>%.2f€</td><td><a href='../products/product-remove.php?product_id=%s'><button type='button' class='btn btn-default btn-sm'> <span class='glyphicon glyphicon-remove'></span> Remove </button></a></td></tr>", $buying_products_array["price"], $buying_products_array["amount"], $buying_products_array["total_price"], $buying_products_array["product_id"] );
                    } 
                }
             ?>
			</table>