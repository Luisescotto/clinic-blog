DELIMITER //
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details`
FOR EACH ROW BEGIN
UPDATE products SET stock = stock + NEW.quantity
WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases`
 FOR EACH ROW BEGIN
    UPDATE products p 
     JOIN purchase_details di
        ON di.product_id = p.id
        AND di.purchase_id = new.id
        set p.stock = p.stock - di.quantity;
end;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details`
FOR EACH ROW BEGIN
UPDATE products SET stock = stock - NEW.quantity
WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales`
FOR EACH ROW BEGIN
UPDATE products p 
    JOIN sale_details dv
    ON dv.product_id = p.id
    AND dv.sale_id = new.id
    set p.stock = p.stock - dv.quantity;
end;
//
DELIMITER ;



/////////////////////////////////////////////////////////////////////////////////////
'/image/product-b-1.jpg',
'/image/product-b-2.jpg',
'/image/product-b-3.jpg',
'/image/product-b-4.jpg',
'/image/product-details-img1.jpg',
'/image/product-details-img2.jpg',
'/image/product-details-img3.jpg',
'/image/product-details-img4.jpg',
'/image/product-details-img5.jpg',
'/image/product-f-1.jpg',
'/image/product-f-2.jpg',
'/image/product-f-3.jpg',
'/image/product-f-4.jpg',
'/image/product-img1.jpg',
'/image/product-img2.jpg',
'/image/product-img3.jpg',
'/image/product-img4.jpg',
'/image/product-img5.jpg',
'/image/product-img6.jpg',
'/image/product-img7.jpg',
'/image/product-img8.jpg',
'/image/product-img9.jpg',
'/image/product-img10.jpg',
'/image/product-img11.jpg',
'/image/product-img12.jpg',
'/image/product-img13.jpg',
'/image/product-img14.jpg',
'/image/product-img15.jpg',
'/image/product-img16.jpg',
'/image/product-s-1.jpg',
'/image/product-s-2.jpg',
'/image/product-s-3.jpg',
'/image/product-s-4.jpg',
'/image/product-s-5.jpg',
'/image/product-s-6.jpg',


/////////////////////////////Business///////////////////////////////
Email ID:
sb-ufxx95857971@business.example.com
System Generated Password:
G!8XqIwP
Signature:
A7yXVKfPyDFQYNQKDg-t9An4CafyAP9RaadAQd.GbU-m2taUf4lnieph

///////////////////////////Personal//////////////////////////////////

Email ID:
sb-6wmxt5834430@personal.example.com
System Generated Password:
?)'772eH

//////////////////////////////////////////////////////////////
Client ID
AaQapNyel37VEUj-NDJROTgWIE31jYPFBCcUOTXgb8finTDcCUhjcRMhoCiwgsPQMPfEcUSJwWW1PRhQ

Created	Secret	Status	Action
Apr 23, 2021	EIlgb6EFv50uduz85aqCLzHx3FMilRWssGfYhr2ElYnvfxmGKkj4ZnH7jUSaH0deLoVaHLJrLMqj_MOX