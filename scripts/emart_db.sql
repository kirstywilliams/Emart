-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2012 at 10:47 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emart`
--
CREATE DATABASE `emart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `emart`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_attribute`(IN inName VARCHAR(100))
BEGIN
INSERT INTO attribute (name) VALUES (inName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_attribute_value`(
IN inAttributeId INT, IN inValue VARCHAR(100))
BEGIN
INSERT INTO attributevalue (attributeID, value)
VALUES (inAttributeId, inValue);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_category`(IN inDepartmentId INT,
IN inName VARCHAR(25), IN inDescription VARCHAR(500))
BEGIN
INSERT INTO categories (departmentID, categoryName, description)
VALUES (inDepartmentId, inName, inDescription);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_department`(
IN inName VARCHAR(100), IN inManager INT, IN inNumber TEXT, IN inDescription VARCHAR(500))
BEGIN
INSERT INTO department (name, manager, telephoneNumber, description)
VALUES (inName, inManager, inNumber, inDescription);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_add_product_to_category`(IN inCategoryId INT,
IN inName VARCHAR(30), IN inBriefDescription VARCHAR(500), IN inDescription VARCHAR(1000),
IN inPrice DECIMAL(10, 2), IN inCurrentQuantity INT, IN inIdealQuantity INT)
BEGIN
DECLARE productLastInsertId INT;
INSERT INTO stock (itemName, briefDescription, longDescription, price)
VALUES (inName, inBriefDescription, inLongDescription, inPrice);
SELECT LAST_INSERT_ID() INTO productLastInsertId;
INSERT INTO productcategories (itemID, categoryID)
VALUES (productLastInsertId, inCategoryId);
INSERT INTO stockcontrol(itemID, currentQuantity, idealQuantity)
VALUES (productLastInsertId, inCurrentQuantity, inIdealQuantity);
IF inCurrentQty <= 0 THEN
UPDATE stockcontrol
SET status = 'OutOfStock'
WHERE itemID = productLastInsertId;
ELSEIF inCurrentQty >= (inIdealQty/2) AND inCurrentQty < inIdealQty THEN
UPDATE stockcontrol
SET status = 'Medium'
WHERE itemID = productLastInsertId;
ELSEIF inCurrentQty > inIdealQty THEN
UPDATE stockcontrol
SET status = 'Stocked'
WHERE itemID = productLastInsertId;
ELSEIF inCurrentQty <= (inIdealQty/2) THEN
UPDATE stockcontrol
SET status = 'Reorder'
WHERE itemID = productLastInsertId;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_assign_attribute_value_to_product`(
IN inProductId INT, IN inAttributeValueId INT)
BEGIN
INSERT INTO productattribute (itemID, attributeValueID)
VALUES (inProductId, inAttributeValueId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_assign_product_to_category`(
IN inProductId INT, IN inCategoryId INT)
BEGIN
INSERT INTO productcategories (itemID, categoryID)
VALUES (inProductId, inCategoryId);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_products_in_category`(IN inCategoryID INT)
BEGIN
SELECT COUNT(*) AS categories_count
FROM stock p
INNER JOIN productcategories pc
ON p.itemID = pc.itemID
WHERE pc.categoryID = inCategoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_products_on_catalog`()
BEGIN
SELECT COUNT(*) AS products_on_catalog_count
FROM stock
WHERE display = 1 OR display = 3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_count_products_on_department`(IN inDepartmentID INT)
BEGIN
SELECT DISTINCT COUNT(*) AS products_on_department_count
FROM stock p
INNER JOIN productcategories pc
ON p.itemID = pc.itemID
INNER JOIN categories c
ON pc.categoryID = c.categoryID
WHERE (p.display = 2 OR p.display = 3)
AND c.departmentID = inDepartmentID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_attribute`(IN inAttributeId INT)
BEGIN
DECLARE attributeRowsCount INT;
SELECT count(*)
FROM attributevalue
WHERE attributeID = inAttributeId
INTO attributeRowsCount;
IF attributeRowsCount = 0 THEN
DELETE FROM attribute WHERE attributeID = inAttributeId;
SELECT 1;
ELSE
SELECT -1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_attribute_value`(IN inAttributeValueId INT)
BEGIN
DECLARE productAttributeRowsCount INT;
SELECT count(*)
FROM stock p
INNER JOIN productattribute pa
ON p.itemID = pa.itemID
WHERE pa.attributeValueID = inAttributeValueId
INTO productAttributeRowsCount;
IF productAttributeRowsCount = 0 THEN
DELETE FROM attributevalue WHERE attributeValueID = inAttributeValueId;
SELECT 1;
ELSE
SELECT -1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_category`(IN inCategoryId INT)
BEGIN
DECLARE productCategoryRowsCount INT;
SELECT count(*)
FROM stock p
INNER JOIN productcategories pc
ON p.itemID = pc.itemID
WHERE pc.categoryID = inCategoryId
INTO productCategoryRowsCount;
IF productCategoryRowsCount = 0 THEN
DELETE FROM categories WHERE categoryID = inCategoryId;
SELECT 1;
ELSE
SELECT -1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_department`(IN inDepartmentId INT)
BEGIN
DECLARE categoryRowsCount INT;
SELECT count(*)
FROM categories
WHERE departmentID = inDepartmentId
INTO categoryRowsCount;
IF categoryRowsCount = 0 THEN
DELETE FROM department WHERE departmentID = inDepartmentId;
SELECT 1;
ELSE
SELECT -1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_delete_product`(IN inProductId INT)
BEGIN
DELETE FROM productattribute WHERE itemID = inProductId;
DELETE FROM productcategories WHERE itemID = inProductId;
DELETE FROM shoppingcart WHERE itemID = inProductId;
DELETE FROM stock WHERE itemID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attributes`()
BEGIN
SELECT attributeID, name FROM attribute ORDER BY attributeID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attributes_not_assigned_to_product`(
IN inProductId INT)
BEGIN
SELECT a.name AS attribute_name,
av.attributeValueID, av.value AS attribute_value
FROM attributevalue av
INNER JOIN attribute a
ON av.attributeID = a.attributeID
WHERE av.attributeValueID NOT IN
(SELECT attributeValueID
FROM productattribute
WHERE itemID = inProductId)
ORDER BY attribute_name, av.attributeValueID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attribute_details`(IN inAttributeId INT)
BEGIN
SELECT attributeID, name
FROM attribute
WHERE attributeID = inAttributeId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_attribute_values`(IN inAttributeId INT)
BEGIN
SELECT attributeValueID, value
FROM attributevalue
WHERE attributeID = inAttributeId
ORDER BY attributeID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_categories`()
BEGIN
SELECT categoryID, categoryName, description
FROM categories
ORDER BY categoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_categories_for_product`(IN inProductId INT)
BEGIN
SELECT c.categoryID, c.departmentID, c.categoryName
FROM categories c
JOIN productcategories pc
ON c.categoryID = pc.categoryID
WHERE pc.itemID = inProductId
ORDER BY categoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_categories_list`(IN inDepartmentID INT)
BEGIN
SELECT categoryID, categoryName
FROM categories
WHERE departmentID = inDepartmentID
ORDER BY categoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_category_details`(IN inCategoryID INT)
BEGIN
SELECT categoryName, description
FROM categories
WHERE categoryID = inCategoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_category_name`(IN inCategoryID INT)
BEGIN
SELECT categoryName FROM categories WHERE categoryID = inCategoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_category_products`(IN inCategoryId INT)
BEGIN
SELECT p.itemID, p.itemName, p.briefDescription, p.longDescription, p.price,
p.discountedPrice
FROM stock p
INNER JOIN productcategories pc
ON p.itemID = pc.itemID
WHERE pc.categoryID = inCategoryId
ORDER BY p.itemID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_departments`()
BEGIN
SELECT departmentID, name, manager, telephoneNumber, description
FROM department
ORDER BY departmentID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_departments_list`()
BEGIN
SELECT departmentID, name FROM department ORDER BY departmentID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_categories`(IN inDepartmentId INT)
BEGIN
SELECT categoryID, categoryName, description
FROM categories
WHERE departmentID = inDepartmentId
ORDER BY categoryID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_details`(IN inDepartmentID INT)
BEGIN
SELECT name, description
FROM department
WHERE departmentID = inDepartmentID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_department_name`(IN inDepartmentID INT)
BEGIN
SELECT name FROM department WHERE departmentID = inDepartmentID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_products_in_category`(
IN inCategoryID INT, IN inShortProductDescriptionLength INT,
IN inProductsPerPage INT, IN inStartItem INT)
BEGIN
PREPARE statement FROM
"SELECT p.itemID, p.itemName,
IF(LENGTH(p.briefDescription) <= ?,
p.briefDescription,
CONCAT(LEFT(p.briefDescription, ?),
'...')) AS briefDescription,
p.price, p.discountedPrice, p.thumbImage
FROM stock p
INNER JOIN productcategories pc
ON p.itemID = pc.itemID
WHERE pc.categoryID = ?
ORDER BY p.display DESC
LIMIT ?, ?";
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inCategoryID;
SET @p4 = inStartItem;
SET @p5 = inProductsPerPage;
-- Execute the statement
EXECUTE statement USING @p1, @p2, @p3, @p4, @p5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_products_on_catalog`(
IN inShortProductDescriptionLength INT,
IN inProductsPerPage INT, IN inStartItem INT)
BEGIN
PREPARE statement FROM
"SELECT itemID, itemName,
IF(LENGTH(briefDescription) <= ?,
briefDescription,
CONCAT(LEFT(briefDescription, ?),
'...')) AS briefDescription,
price, discountedPrice, thumbImage
FROM stock
WHERE display = 1 OR display = 3
ORDER BY display DESC
LIMIT ?, ?";
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inStartItem;
SET @p4 = inProductsPerPage;
EXECUTE statement USING @p1, @p2, @p3, @p4;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_products_on_department`(
IN inDepartmentID INT, IN inShortProductDescriptionLength INT,
IN inProductsPerPage INT, IN inStartItem INT)
BEGIN
PREPARE statement FROM
"SELECT DISTINCT p.itemID, p.itemName,
IF(LENGTH(p.briefDescription) <= ?,
p.briefDescription,
CONCAT(LEFT(p.briefDescription, ?),
'...')) AS briefDescription,
p.price, p.discountedPrice, p.thumbImage
FROM stock p
INNER JOIN productcategories pc
ON p.itemID = pc.itemID
INNER JOIN categories c
ON pc.categoryID = c.categoryID
WHERE (p.display = 2 OR p.display = 3)
AND c.departmentID = ?
ORDER BY p.display DESC
LIMIT ?, ?";
SET @p1 = inShortProductDescriptionLength;
SET @p2 = inShortProductDescriptionLength;
SET @p3 = inDepartmentID;
SET @p4 = inStartItem;
SET @p5 = inProductsPerPage;
EXECUTE statement USING @p1, @p2, @p3, @p4, @p5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_attributes`(IN inProductID INT)
BEGIN
SELECT a.name AS attribute_name,
av.attributeValueID, av.value AS attribute_value
FROM attributevalue av
INNER JOIN attribute a
ON av.attributeID = a.attributeID
WHERE av.attributeValueID IN
(SELECT attributeValueID
FROM productattribute
WHERE itemID = inProductID)
ORDER BY a.name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_details`(IN inProductID INT)
BEGIN
SELECT itemID, itemName, longDescription,
price, discountedPrice, bigImage
FROM stock
WHERE itemID = inProductID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_info`(IN inProductId INT)
BEGIN
SELECT itemID, itemName, briefDescription, longDescription, supplierID, price, discountedPrice,
thumbImage, bigImage, display
FROM stock
WHERE itemID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_locations`(IN inProductID INT)
BEGIN
SELECT c.categoryID, c.categoryName AS category_name, c.departmentID,
(SELECT name
FROM department
WHERE departmentID = c.departmentID) AS department_name
FROM categories c
WHERE c.categoryID IN
(SELECT categoryID
FROM productcategories
WHERE itemID = inProductID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_get_product_name`(IN inProductID INT)
BEGIN
SELECT itemName FROM stock WHERE itemID = inProductID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_move_product_to_category`(IN inProductId INT,
IN inSourceCategoryId INT, IN inTargetCategoryId INT)
BEGIN
UPDATE productcategories
SET categoryID = inTargetCategoryId
WHERE itemID = inProductId
AND categoryID = inSourceCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_remove_product_attribute_value`(
IN inProductId INT, IN inAttributeValueId INT)
BEGIN
DELETE FROM productattribute
WHERE itemID = inProductId AND
attributeValueID = inAttributeValueId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_remove_product_from_category`(
IN inProductId INT, IN inCategoryId INT)
BEGIN
DECLARE productCategoryRowsCount INT;
SELECT count(*)
FROM productcategories
WHERE itemID = inProductId
INTO productCategoryRowsCount;
IF productCategoryRowsCount = 1 THEN
CALL catalog_delete_product(inProductId);
SELECT 0;
ELSE
DELETE FROM productcategories
WHERE categoryID = inCategoryId AND itemID = inProductId;
SELECT 1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_image`(
IN inProductId INT, IN inImage VARCHAR(150))
BEGIN
UPDATE stock SET thumbImage = inImage WHERE itemID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_image_2`(
IN inProductId INT, IN inImage VARCHAR(150))
BEGIN
UPDATE stock SET bigImage = inImage WHERE itemID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_set_product_display_option`(
IN inProductId INT, IN inDisplay SMALLINT)
BEGIN
UPDATE stock SET display = inDisplay WHERE itemID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_attribute`(
IN inAttributeId INT, IN inName VARCHAR(100))
BEGIN
UPDATE attribute SET name = inName WHERE attributeID = inAttributeId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_attribute_value`(
IN inAttributeValueId INT, IN inValue VARCHAR(100))
BEGIN
UPDATE attributevalue
SET value = inValue
WHERE attributeValueID = inAttributeValueId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_category`(IN inCategoryId INT,
IN inName VARCHAR(25), IN inDescription VARCHAR(500))
BEGIN
UPDATE categories
SET categoryName = inName, description = inDescription
WHERE categoryID = inCategoryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_department`(IN inDepartmentId INT,
IN inName VARCHAR(100), IN inManager INT, IN inNumber TEXT, IN inDescription VARCHAR(500))
BEGIN
UPDATE department
SET name = inName, manager = inManager, telephoneNumber = inNumber, description = inDescription
WHERE departmentID = inDepartmentId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `catalog_update_product`(IN inProductId INT,
IN inName VARCHAR(100), IN inBriefDescription VARCHAR(500), IN inLongDescription VARCHAR(1000), 
IN inSupplier INT, IN inPrice DECIMAL(10, 2), IN inDiscountedPrice DECIMAL(10, 2))
BEGIN
UPDATE stock
SET itemName = inName, briefDescription = inBriefDescription, longDescription = inLongDescription, 
supplierID = inSupplier, price = inPrice, discountedPrice = inDiscountedPrice
WHERE itemID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_add`(IN inFirstName VARCHAR(30),
IN inSurname VARCHAR(30),
IN inEmail VARCHAR(80), IN inPassword VARCHAR(50), IN inOriginalPassword VARCHAR(50),
IN inAddressLineOne VARCHAR(50), IN inTown VARCHAR(50), IN inCity VARCHAR(50), 
IN inCounty VARCHAR(50), IN inPostCode VARCHAR(8), IN inTelephone TEXT)
BEGIN
INSERT INTO contactdetails (addressLineOne, town, city, county, postcode, telephoneNumber)
VALUES (inAddressLineOne, inTown, inCity, inCounty, inPostCode, inTelephone);
INSERT INTO customer (firstname, surname, emailAddress, password, unencPassword, contactID)
VALUES (inFirstName, inSurname, inEmail, inPassword, inOriginalPassword, (SELECT contactID
FROM contactdetails 
WHERE addressLineOne = inAddressLineOne
AND postcode = inPostCode));
SELECT LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_delete_customer`(IN inCustomerId INT)
BEGIN
DELETE FROM customer WHERE customerID = inCustomerId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_customer`(IN inCustomerId INT)
BEGIN
SELECT c.customerID, c.firstname, c.surname, c.emailAddress, c.password, c.unencPassword, c.creditCard,
cd.addressLineOne, cd.town, cd.city, cd.county, cd.postcode, cd.telephoneNumber
FROM customer c, contactdetails cd
WHERE c.customerID = inCustomerId
AND c.contactID = cd.contactID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_customers_list`()
BEGIN
SELECT customerID, firstname, surname, emailAddress FROM customer ORDER BY surname ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_login_info`(IN inEmail VARCHAR(100))
BEGIN
SELECT customerID, password FROM customer WHERE emailAddress = inEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_get_unencPassword`(IN inEmail VARCHAR(80))
BEGIN
SELECT unencPassword
FROM customer
WHERE emailAddress = inEmail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_update_account`(IN inCustomerId INT,
IN inFirstName VARCHAR(30), IN inSurname VARCHAR(30), IN inEmail VARCHAR(80),
IN inPassword VARCHAR(50), IN inOriginalPassword VARCHAR(50), IN inTelephone TEXT, IN inAddressLineOne VARCHAR(50), IN inTown VARCHAR(50),
IN inCity VARCHAR(50), IN inCounty VARCHAR(50), IN inPostCode VARCHAR(8))
BEGIN
IF (inPassword = null OR inOriginalPassword = null) THEN
UPDATE customer c, contactdetails cd
SET c.firstname = inFirstName, c.surname = inSurname, c.emailAddress = inEmail, cd.telephoneNumber = inTelephone, cd.addressLineOne = inAddressLineOne, cd.city = inCity,
cd.town = inTown, cd.county = inCounty, cd.postcode = inPostCode
WHERE c.customerID = inCustomerId
AND c.contactID = cd.contactID;
ELSE
UPDATE customer c, contactdetails cd
SET c.firstname = inFirstName, c.surname = inSurname, c.emailAddress = inEmail, c.password = inPassword, c.unencPassword = inOriginalPassword, cd.telephoneNumber = inTelephone, cd.addressLineOne = inAddressLineOne, cd.city = inCity,
cd.town = inTown, cd.county = inCounty, cd.postcode = inPostCode
WHERE c.customerID = inCustomerId
AND c.contactID = cd.contactID;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_update_address`(IN inCustomerId INT,
IN inAddressLineOne VARCHAR(50), IN inTown VARCHAR(50),
IN inCity VARCHAR(50), IN inCounty VARCHAR(50),
IN inPostCode VARCHAR(8))
BEGIN
UPDATE customer c, contactdetails cd
SET cd.addressLineOne = inAddressLineOne, cd.town = inTown, cd.city = inCity,
cd.county = inCounty, cd.postcode = inPostCode
WHERE c.customerID = inCustomerId
AND c.contactID = cd.contactID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `customer_update_credit_card`(
IN inCustomerId INT, IN inCreditCard TEXT)
BEGIN
UPDATE customer
SET creditcard = inCreditCard
WHERE customerID = inCustomerId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_create_audit`(IN inOrderId INT,
IN inMessage TEXT, IN inCode INT)
BEGIN
INSERT INTO audit (order_id, created_on, message, code)
VALUES (inOrderId, NOW(), inMessage, inCode);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_audit_trail`(IN inOrderId INT)
BEGIN
SELECT audit_id, order_id, created_on, message, code
FROM audit
WHERE order_id = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_by_customer_id`(IN inCustomerId INT)
BEGIN
SELECT o.orderID, o.totalAmount, o.createdOn,
o.shippedOn, o.orderStatus, c.firstname, c.surname
FROM orders o
INNER JOIN customer c
ON o.customerID = c.customerID
WHERE o.customerID = inCustomerId
ORDER BY o.createdOn DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_most_recent_orders`(IN inHowMany INT)
BEGIN
PREPARE statement FROM
"SELECT o.orderID, o.totalAmount, o.createdOn,
o.shippedOn, o.orderStatus, c.firstname, c.surname
FROM orders o
INNER JOIN customer c
ON o.customerID = c.customerID
ORDER BY o.createdOn DESC
LIMIT ?";
SET @p1 = inHowMany;
EXECUTE statement USING @p1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_orders_between_dates`(
IN inStartDate DATETIME, IN inEndDate DATETIME)
BEGIN
SELECT o.orderID, o.totalAmount, o.createdOn,
o.shippedOn, o.orderStatus, c.firstname, c.surname
FROM orders o
INNER JOIN customer c
ON o.customerID = c.customerID
WHERE o.createdOn >= inStartDate AND o.createdOn <= inEndDate
ORDER BY o.createdOn DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_orders_by_status`(IN inStatus enum('Received','Checking Funds','Notifying Stock Check','Awaiting Stock Confirmation','Awaiting Payment','Notifying Warehouse Despatch','Awaiting Despatch Confirmation','Notifying Customer','Complete','Cancelled'))
BEGIN
SELECT o.orderID, o.totalAmount, o.createdOn,
o.shippedOn, o.orderStatus, c.firstname, c.surname
FROM orders o
INNER JOIN customer c
ON o.customerID = c.customerID
WHERE o.orderstatus = inStatus
ORDER BY o.createdOn DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_order_details`(IN inOrderId INT)
BEGIN
SELECT orderID, itemID, attributes, itemName,
orderQuantity, price, (orderQuantity * price) AS subtotal
FROM orderitems
WHERE orderID = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_order_info`(IN inOrderId INT)
BEGIN
SELECT o.orderID, o.totalAmount, o.createdOn, o.shippedOn, o.orderStatus,
o.comments, o.authCode, o.reference, o.shippingID, s.shippingType, s.shippingCost, o.customerID, c.firstname, c.surname, cd.addressLineOne, cd.town, cd.city, 
cd.county, cd.postcode, cd.telephoneNumber, c.emailAddress
FROM orders o, customer c, contactdetails cd, shipping s
WHERE orderID = inOrderId
AND o.customerID = c.customerID
AND c.contactID = cd.contactID
AND s.shippingID = o.shippingID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_order_short_details`(IN inOrderId INT)
BEGIN
SELECT o.orderID, o.totalAmount, o.createdOn,
o.shippedOn, o.orderStatus, c.firstname, c.surname
FROM orders o
INNER JOIN customer c
ON o.customerID = c.customerID
WHERE o.orderID = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_get_shipping_info`()
BEGIN
SELECT shippingID, shippingType, shippingCost
FROM shipping;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_set_auth_code`(IN inOrderId INT,
IN inAuthCode VARCHAR(50), IN inReference VARCHAR(50))
BEGIN
UPDATE orders
SET authCode = inAuthCode, reference = inReference
WHERE orderID = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_set_date_shipped`(IN inOrderId INT)
BEGIN
UPDATE orders SET shippedOn = NOW() WHERE orderID = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_update_order`(IN inOrderId INT, IN inStatus ENUM('Received','Checking Funds','Notifying Stock Check','Awaiting Stock Confirmation','Awaiting Payment','Notifying Warehouse Despatch','Awaiting Despatch Confirmation','Notifying Customer','Complete','Cancelled'),
IN inComments VARCHAR(255),  IN inAuthCode VARCHAR(50),
IN inReference VARCHAR(50), IN inFirstName VARCHAR(30), IN inSurname VARCHAR(30),
IN inAddressLineOne VARCHAR(50), IN inTown VARCHAR(50), IN inCity VARCHAR(50), 
IN inCounty VARCHAR(50), IN inPostCode VARCHAR(8), IN inCustomerEmail VARCHAR(50), IN inTelephone TEXT)
BEGIN
DECLARE currentDateShipped DATETIME;
SELECT shippedOn
FROM orders
WHERE orderID = inOrderId
INTO currentDateShipped;
UPDATE orders o, customer c, contactdetails cd
SET o.orderStatus = inStatus, o.comments = inComments,
o.authCode = inAuthCode, o.reference = inReference,
c.firstname = inFirstName,
c.surname = inSurname,
cd.addressLineOne = inAddressLineOne,
cd.town = inTown,
cd.city = inCity,
cd.county = inCounty,
cd.postcode = inPostCode,
c.emailAddress = inCustomerEmail,
cd.telephoneNumber = inTelephone
WHERE o.orderID = inOrderId
AND o.customerID = c.customerID
AND c.contactID = cd.contactID;
IF inStatus = 'Received' OR inStatus = 'Checking Funds' OR inStatus = 'Notifying Stock Check' OR inStatus = 'Awaiting Stock Confirmation' OR inStatus = 'Awaiting Payment' OR inStatus = 'Notifying Warehouse Despatch' OR inStatus = 'Notifying Customer' OR inStatus = 'Complete' OR inStatus = 'Cancelled' THEN
UPDATE orders SET shippedOn = NULL WHERE orderID = inOrderId;
ELSEIF inStatus != currentStatus AND inStatus = 'Awaiting Despatch Confirmation' THEN
UPDATE orders SET shippedOn = NOW() WHERE orderID = inOrderId;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `orders_update_status`(IN inOrderId INT, IN inStatus ENUM('Received','Checking Funds','Notifying Stock Check','Awaiting Stock Confirmation','Awaiting Payment','Notifying Warehouse Despatch','Awaiting Despatch Confirmation','Notifying Customer','Complete','Cancelled'))
BEGIN
UPDATE orders SET orderStatus = inStatus WHERE orderID = inOrderId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shipping_add_shipping`(IN inType VARCHAR(100), IN inCost DECIMAL(10, 2))
BEGIN
INSERT INTO shipping (shippingType, shippingCost) VALUES (inType, inName);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shipping_delete_shipping`(IN inShippingId INT)
BEGIN
DELETE FROM shipping WHERE shippingID = inShippingId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shipping_get_shipping`()
BEGIN
SELECT shippingID, shippingType, shippingCost FROM shipping ORDER BY shippingID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shipping_update_shipping`(
IN inShippingId INT, IN inType VARCHAR(100), IN inCost DECIMAL(10,2))
BEGIN
UPDATE shipping SET shippingType = inType, shippingCost = inCost WHERE shippingID = inShippingId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_add_product`(IN inCartId CHAR(32),
IN inProductId INT, IN inAttributes VARCHAR(1000))
BEGIN
DECLARE productQuantity INT;
SELECT quantity
FROM shoppingcart
WHERE cartID = inCartId
AND itemID = inProductId
AND attributes = inAttributes
INTO productQuantity;
IF productQuantity IS NULL THEN
    INSERT INTO shoppingcart(cartID, itemID, attributes,
                              quantity, addedOn)
           VALUES (inCartId, inProductId, inAttributes, 1, NOW());
ELSE
UPDATE shoppingcart
SET quantity = quantity + 1, buyNow = true
WHERE cartID = inCartId
AND itemID = inProductId
AND attributes = inAttributes;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_count_old_carts`(IN inDays INT)
BEGIN
SELECT COUNT(cartID) AS old_shopping_carts_count
FROM (SELECT cartID
FROM shoppingcart
GROUP BY cartID
HAVING DATE_SUB(NOW(), INTERVAL inDays DAY) >= MAX(addedOn))
AS old_carts;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_create_order`(IN inCartId CHAR(32),
IN inCustomerId INT, IN inShippingId INT)
BEGIN
DECLARE new_order INT;
INSERT INTO orders (createdOn, customerID, shippingID, orderStatus) VALUES (NOW(), inCustomerId, inShippingId, 'Received');

SELECT LAST_INSERT_ID() INTO new_order;

INSERT INTO orderitems (orderID, itemID, attributes,
itemName, orderQuantity, price)
SELECT new_order, p.itemID, sc.attributes, p.itemName, sc.quantity,
COALESCE(NULLIF(p.discountedPrice, 0), p.price) AS price
FROM shoppingcart sc
INNER JOIN stock p
ON sc.itemID = p.itemID
WHERE sc.cartID = inCartId AND sc.buyNow;
UPDATE orders o
SET o.totalAmount = (SELECT SUM(price * orderQuantity)
FROM orderitems
WHERE orderID = new_order)
WHERE o.orderID = new_order;
CALL shopping_cart_empty(inCartId);
SELECT new_order;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_delete_old_carts`(IN inDays INT)
BEGIN
DELETE FROM shoppingcart
WHERE cartID IN
(SELECT cartID
FROM (SELECT cartID
FROM shoppingcart
GROUP BY cartID
HAVING DATE_SUB(NOW(), INTERVAL inDays DAY) >=
MAX(addedOn))
AS sc);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_empty`(IN inCartId CHAR(32))
BEGIN
DELETE FROM shoppingcart WHERE cartID = inCartId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_products`(IN inCartId CHAR(32))
BEGIN
SELECT sc.productID, p.itemName, sc.attributes,
COALESCE(NULLIF(p.discountedPrice, 0), p.price) AS price,
sc.quantity,
COALESCE(NULLIF(p.discountedPrice, 0),
p.price) * sc.quantity AS subtotal
FROM shoppingcart sc
INNER JOIN stock p
ON sc.itemID = p.itemID
WHERE sc.cartID = inCartId AND sc.buyNow;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_saved_products`(IN inCartId CHAR(32))
BEGIN
SELECT sc.productID, p.itemName, sc.attributes,
COALESCE(NULLIF(p.discountedPrice, 0), p.price) AS price
FROM shoppingcart sc
INNER JOIN stock p
ON sc.itemID = p.itemID
WHERE sc.cartID = inCartId AND NOT sc.buyNow;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_get_total_amount`(IN inCartId CHAR(32))
BEGIN
SELECT SUM(COALESCE(NULLIF(p.discountedPrice, 0), p.price)
* sc.quantity) AS total_amount
FROM shoppingcart sc
INNER JOIN stock p
ON sc.itemID = p.itemID
WHERE sc.cartID = inCartId AND sc.buyNow;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_move_product_to_cart`(IN inProductId INT)
BEGIN
UPDATE shoppingcart
SET buyNow = true, addedOn = NOW()
WHERE productID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_remove_product`(IN inProductId INT)
BEGIN
DELETE FROM shoppingcart WHERE productID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_save_product_for_later`(IN inProductId INT)
BEGIN
UPDATE shoppingcart
SET buyNow = false, quantity = 1
WHERE productID = inProductId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shopping_cart_update`(IN inProductId INT, IN inQuantity INT)
BEGIN
IF inQuantity > 0 THEN
UPDATE shoppingcart
SET quantity = inQuantity, addedOn = NOW()
WHERE productID = inProductId;
ELSE
CALL shopping_cart_remove_product(inProductId);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stock_get_item`(IN inItemId INT)
BEGIN
SELECT s.itemName, sc.idealQuantity, sc.currentQuantity, sc.status, s.supplierID
FROM stock s, stockcontrol sc
WHERE sc.itemID = inItemId 
AND s.itemID = inItemId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stock_get_stock`()
BEGIN
SELECT sc.itemID, s.itemName, sc.status FROM stock s, stockcontrol sc
WHERE s.itemID = sc.itemID
ORDER BY itemName ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `stock_update_stock`(IN inItemId INT, IN inIdealQty INT, IN inCurrentQty INT)
BEGIN
UPDATE stockcontrol
SET idealQuantity = inIdealQty, currentQuantity = inCurrentQty
WHERE itemID = inItemId;
IF inCurrentQty <= 0 THEN
UPDATE stockcontrol
SET status = 'OutOfStock'
WHERE itemID = inItemId;
ELSEIF inCurrentQty >= (inIdealQty/2) AND inCurrentQty < inIdealQty THEN
UPDATE stockcontrol
SET status = 'Medium'
WHERE itemID = inItemId;
ELSEIF inCurrentQty > inIdealQty THEN
UPDATE stockcontrol
SET status = 'Stocked'
WHERE itemID = inItemId;
ELSEIF inCurrentQty <= (inIdealQty/2) THEN
UPDATE stockcontrol
SET status = 'Reorder'
WHERE itemID = inItemId;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_add`(IN inName VARCHAR(30),
IN inEmail VARCHAR(80),
IN inAddressLineOne VARCHAR(50), IN inTown VARCHAR(50), IN inCity VARCHAR(50), 
IN inCounty VARCHAR(50), IN inPostCode VARCHAR(8), IN inTelephone TEXT)
BEGIN
INSERT INTO contactdetails (addressLineOne, town, city, county, postcode, telephoneNumber)
VALUES (inAddressLineOne, inTown, inCity, inCounty, inPostCode, inTelephone);
INSERT INTO suppliers (supplierName, emailAddress, contactID)
VALUES (inName, inEmail,  (SELECT contactID
FROM contactdetails 
WHERE addressLineOne = inAddressLineOne
AND postcode = inPostCode));
SELECT LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_add_delivery`(IN inSupplierId INT, IN inDate DATE, IN inTime TIME)
BEGIN
INSERT INTO supplierdeliveries(supplierID, dateOfDelivery, timeOfDelivery)
VALUES (inSupplierId, inDate, inTime);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_delete_supplier`(IN inSupplierId INT)
BEGIN
DELETE FROM supplierDeliveries WHERE supplierID = inSupplierId;
DELETE FROM suppliers WHERE supplierID = inSupplierId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_get_deliveries`(IN inSupplierId INT)
BEGIN
SELECT s.supplierName, d.deliveryID, d.dateOfDelivery, d.timeOfDelivery
FROM suppliers s, supplierdeliveries d
WHERE s.supplierID = inSupplierId
AND d.supplierID = inSupplierId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_get_delivery_info`(IN inDeliveryId INT)
BEGIN
SELECT s.supplierName, d.dateOfDelivery, d.timeOfDelivery
FROM suppliers s, supplierdeliveries d
WHERE d.deliveryID = inDeliveryId
AND s.supplierID = d.supplierID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_get_supplier`(IN inSupplierId INT)
BEGIN
SELECT s.supplierID, s.supplierName, s.emailAddress,
cd.addressLineOne, cd.town, cd.city, cd.county, cd.postcode, cd.telephoneNumber
FROM suppliers s, contactdetails cd
WHERE s.supplierID = inSupplierId
AND s.contactID = cd.contactID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_get_supplier_list`()
BEGIN
SELECT supplierID, supplierName, emailAddress FROM suppliers ORDER BY supplierName ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_remove_delivery`(IN inDeliveryId INT)
BEGIN
DELETE FROM supplierdeliveries WHERE deliveryID = inDeliveryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_update_account`(IN inSupplierId INT,
IN inName VARCHAR(30), IN inEmail VARCHAR(80),
IN inTelephone TEXT, IN inAddressLineOne VARCHAR(50), IN inTown VARCHAR(50),
IN inCity VARCHAR(50), IN inCounty VARCHAR(50), IN inPostCode VARCHAR(8))
BEGIN
UPDATE suppliers s, contactdetails cd
SET s.supplierName = inName, s.emailAddress = inEmail, cd.telephoneNumber = inTelephone, cd.addressLineOne = inAddressLineOne, cd.city = inCity,
cd.town = inTown, cd.county = inCounty, cd.postcode = inPostCode
WHERE s.supplierID = inSupplierId
AND s.contactID = cd.contactID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supplier_update_delivery`(IN inDeliveryId INT, IN inDate DATE, IN inTime TIME)
BEGIN
UPDATE supplierdeliveries
SET dateOfDelivery = inDate, timeOfDelivery = inTime
WHERE deliveryID = inDeliveryId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_contact_id`(IN inAddressLineOne VARCHAR(50), IN inPostCode VARCHAR(8), IN inCustomerId INT)
BEGIN
UPDATE customer c, contactdetails cd SET c.contactID = cd.contactID
WHERE cd.addressLineOne = inAddressLineOne AND cd.postcode = inPostCode AND c.customerID = inCustomerId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `attributeID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`attributeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeID`, `name`) VALUES
(1, 'Size'),
(2, 'Weight'),
(3, 'Colour');

-- --------------------------------------------------------

--
-- Table structure for table `attributevalue`
--

CREATE TABLE IF NOT EXISTS `attributevalue` (
  `attributeValueID` int(11) NOT NULL AUTO_INCREMENT,
  `attributeID` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`attributeValueID`),
  KEY `attributeID` (`attributeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `attributevalue`
--

INSERT INTO `attributevalue` (`attributeValueID`, `attributeID`, `value`) VALUES
(1, 1, 'XS'),
(2, 1, 'S'),
(3, 1, 'M'),
(4, 1, 'L'),
(5, 1, 'XL'),
(6, 3, 'Red'),
(7, 3, 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `message` text NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`audit_id`),
  KEY `idx_audit_order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`audit_id`, `order_id`, `created_on`, `message`, `code`) VALUES
(1, 1, '2012-05-15 18:01:33', 'Order Processor started.', 10000),
(2, 1, '2012-05-15 18:01:33', 'PsInitialNotification started.', 20000),
(3, 1, '2012-05-15 18:01:33', 'Notification e-mail sent to customer.', 20002),
(4, 1, '2012-05-15 18:01:33', 'PsInitialNotification finished.', 20001),
(5, 1, '2012-05-15 18:01:33', 'PsCheckFunds started.', 20100),
(6, 1, '2012-05-15 18:01:34', 'Funds available for purchase.', 20102),
(7, 1, '2012-05-15 18:01:34', 'PsCheckFunds finished.', 20101),
(8, 1, '2012-05-15 18:01:34', 'PsCheckStock started.', 20200),
(9, 1, '2012-05-15 18:01:34', 'Notification email sent to warehouse.', 20202),
(10, 1, '2012-05-15 18:01:34', 'PsCheckStock finished.', 20201),
(11, 1, '2012-05-15 18:01:34', 'Order Processor finished.', 10001),
(12, 1, '2012-05-15 18:10:47', 'Order Processor started.', 10000),
(13, 1, '2012-05-15 18:10:47', 'PsStockOk started.', 20300),
(14, 1, '2012-05-15 18:10:47', 'Stock confirmed by warehouse.', 20302),
(15, 1, '2012-05-15 18:10:47', 'PsStockOk finished.', 20301),
(16, 1, '2012-05-15 18:10:47', 'PsTakePayment started.', 20400),
(17, 1, '2012-05-15 18:10:48', 'Funds deducted from customer credit card account.', 20402),
(18, 1, '2012-05-15 18:10:48', 'PsTakePayment finished.', 20401),
(19, 1, '2012-05-15 18:10:48', 'PsShipGoods started.', 20500),
(20, 1, '2012-05-15 18:10:48', 'Ship goods e-mail sent to warehouse.', 20502),
(21, 1, '2012-05-15 18:10:48', 'PsShipGoods finished.', 20501),
(22, 1, '2012-05-15 18:10:48', 'Order Processor finished.', 10001),
(23, 1, '2012-05-15 18:19:19', 'Order Processor started.', 10000),
(24, 1, '2012-05-15 18:19:19', 'PsShipOk started.', 20600),
(25, 1, '2012-05-15 18:19:19', 'Order dispatched by warehouse.', 20602),
(26, 1, '2012-05-15 18:19:19', 'PsShipOk finished.', 20601),
(27, 1, '2012-05-15 18:19:19', 'PsFinalNotification started.', 20700),
(28, 1, '2012-05-15 18:19:19', 'Dispatch email send to customer.', 20702),
(29, 1, '2012-05-15 18:19:19', 'PsFinalNotification finished.', 20701),
(30, 1, '2012-05-15 18:19:19', 'Order Processor finished.', 10001),
(31, 2, '2012-05-15 20:32:12', 'Order Processor started.', 10000),
(32, 2, '2012-05-15 20:32:12', 'PsInitialNotification started.', 20000),
(33, 2, '2012-05-15 20:32:12', 'Notification e-mail sent to customer.', 20002),
(34, 2, '2012-05-15 20:32:12', 'PsInitialNotification finished.', 20001),
(35, 2, '2012-05-15 20:32:12', 'PsCheckFunds started.', 20100),
(36, 2, '2012-05-15 20:32:14', 'Funds available for purchase.', 20102),
(37, 2, '2012-05-15 20:32:14', 'PsCheckFunds finished.', 20101),
(38, 2, '2012-05-15 20:32:14', 'PsCheckStock started.', 20200),
(39, 2, '2012-05-15 20:32:14', 'Notification email sent to warehouse.', 20202),
(40, 2, '2012-05-15 20:32:14', 'PsCheckStock finished.', 20201),
(41, 2, '2012-05-15 20:32:14', 'Order Processor finished.', 10001),
(42, 2, '2012-05-15 20:44:10', 'Order Processor started.', 10000),
(43, 2, '2012-05-15 20:44:10', 'PsStockOk started.', 20300),
(44, 2, '2012-05-15 20:44:10', 'Stock confirmed by warehouse.', 20302),
(45, 2, '2012-05-15 20:44:10', 'PsStockOk finished.', 20301),
(46, 2, '2012-05-15 20:44:10', 'PsTakePayment started.', 20400),
(47, 2, '2012-05-15 20:44:11', 'Funds deducted from customer credit card account.', 20402),
(48, 2, '2012-05-15 20:44:11', 'PsTakePayment finished.', 20401),
(49, 2, '2012-05-15 20:44:11', 'PsShipGoods started.', 20500),
(50, 2, '2012-05-15 20:44:11', 'Ship goods e-mail sent to warehouse.', 20502),
(51, 2, '2012-05-15 20:44:11', 'PsShipGoods finished.', 20501),
(52, 2, '2012-05-15 20:44:11', 'Order Processor finished.', 10001);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `departmentID` int(11) NOT NULL,
  `categoryName` varchar(25) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`categoryID`),
  KEY `departmentID` (`departmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `departmentID`, `categoryName`, `description`) VALUES
(1, 1, 'Fresh Fruit', 'From crisp apples to vibrant red strawberries, you will always find the highest-quality fresh fruit each and every time you shop with us.'),
(2, 1, 'Vegetables', ''),
(3, 1, 'Salad', ''),
(4, 1, 'Dairy Produce', ''),
(5, 1, 'Fresh Meat', ''),
(6, 2, 'Flowers', ''),
(7, 2, 'Fresh Herbs and Spices', ''),
(8, 2, 'Organic Vegetable Seeds', ''),
(9, 3, 'Bread', ''),
(10, 3, 'Cakes', ''),
(11, 3, 'Pastries', ''),
(12, 3, 'Pies', ''),
(13, 4, 'Tins, Cans and Packets', ''),
(14, 4, 'Pasta, Rice and Noodles', ''),
(15, 4, 'Condiments', ''),
(16, 4, 'Cereals', ''),
(17, 4, 'Baking', ''),
(18, 4, 'Biscuits', ''),
(19, 4, 'Confectionary', ''),
(20, 4, 'Sweet and Savoury Spreads', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactdetails`
--

CREATE TABLE IF NOT EXISTS `contactdetails` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `addressLineOne` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `telephoneNumber` text NOT NULL,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `emailAddress` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `unencPassword` varchar(50) NOT NULL,
  `creditCard` text NOT NULL,
  `contactID` int(11) NOT NULL,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `emailAddress` (`emailAddress`),
  KEY `contactID` (`contactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `departmentID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `manager` int(11) DEFAULT NULL,
  `telephoneNumber` text NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `name`, `manager`, `telephoneNumber`, `description`) VALUES
(1, 'Fresh Food', 0, '01510000001', 'Here you will find the very best in locally sourced organic fruit, vegetables and dairy products.'),
(2, 'Plants', 0, '01510000002', 'Here you will find fresh herbs and seeds to grow in your very own vegetable patch.'),
(3, 'Baked Goods', 0, '01510000003', 'Here you will find mouth watering, freshly baked breads and  delicious treats.'),
(4, 'Food Cupboard', 0, '01510000004', 'Here you will find all those bits and bobs that hide away in the cupboard.'),
(5, 'Beverages', 0, '01510000005', 'Here you will find the very best in organic drinks to quench your thirst.'),
(6, 'Health & Beauty', 0, '01510000006', 'Here you will find the very best in cosmetics for you and your body.'),
(7, 'Household', 0, '01510000007', 'Give your home that luxurious clean feeling with our selection of household products.'),
(8, 'Special Diet', 0, '01510000008', 'Here you will find all those foods for speciality diets like gluten free, wheat free etc.'),
(9, 'Chilled & Frozen Foods', 0, '01510000009', 'Here you will find our chilled and frozen food selection.'),
(10, 'Pets', 0, '01510000010', 'Spoil your adored pets with our large selection of luxurious treats and toys.');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `orderID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `attributes` varchar(1000) NOT NULL,
  `itemName` varchar(30) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `orderID` (`orderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`productID`, `orderID`, `itemID`, `attributes`, `itemName`, `orderQuantity`, `price`) VALUES
(1, 1, 5, '', 'Strawberry Pack', 1, 1.99),
(2, 1, 2, 'Colour: Red', 'Golden Delicious Apples', 1, 0.27),
(4, 2, 15, '', 'Cheese', 1, 1.99);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` int(11) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `createdOn` datetime NOT NULL,
  `shippedOn` datetime DEFAULT NULL,
  `orderStatus` enum('Received','Checking Funds','Notifying Stock Check','Awaiting Stock Confirmation','Awaiting Payment','Notifying Warehouse Despatch','Awaiting Despatch Confirmation','Notifying Customer','Complete','Cancelled') DEFAULT 'Received',
  `comments` varchar(255) DEFAULT NULL,
  `authCode` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `shippingID` int(11) DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID` (`customerID`),
  KEY `shippingID` (`shippingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `totalAmount`, `createdOn`, `shippedOn`, `orderStatus`, `comments`, `authCode`, `reference`, `shippingID`) VALUES
(1, 1, 2.26, '2012-05-15 18:01:32', '2012-05-15 18:19:19', 'Complete', NULL, '2LHVAO', '2171894760', 1),
(2, 3, 1.99, '2012-05-15 20:32:12', NULL, 'Awaiting Despatch Confirmation', NULL, 'HO5Z8D', '2171898331', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productattribute`
--

CREATE TABLE IF NOT EXISTS `productattribute` (
  `itemID` int(11) NOT NULL,
  `attributeValueID` int(11) NOT NULL,
  PRIMARY KEY (`itemID`,`attributeValueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productattribute`
--

INSERT INTO `productattribute` (`itemID`, `attributeValueID`) VALUES
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE IF NOT EXISTS `productcategories` (
  `itemID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`itemID`,`categoryID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`itemID`, `categoryID`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `shippingID` int(11) NOT NULL AUTO_INCREMENT,
  `shippingType` varchar(100) NOT NULL,
  `shippingCost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`shippingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingID`, `shippingType`, `shippingCost`) VALUES
(1, 'Next Day Delivery (&pound6.75)', 6.75),
(2, '3-4 Days (&pound4.50)', 4.50),
(3, '7 Days (&pound3)', 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `cartID` char(32) NOT NULL,
  `itemID` int(11) NOT NULL,
  `attributes` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inventoryQty` int(11) NOT NULL,
  `buyNow` tinyint(1) NOT NULL DEFAULT '1',
  `addedOn` datetime NOT NULL,
  PRIMARY KEY (`productID`),
  KEY `cartID` (`cartID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(30) NOT NULL,
  `briefDescription` varchar(500) NOT NULL,
  `longDescription` varchar(1000) DEFAULT NULL,
  `supplierID` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discountedPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `thumbImage` varchar(150) DEFAULT NULL,
  `bigImage` varchar(150) DEFAULT NULL,
  `display` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemID`),
  KEY `supplierID` (`supplierID`),
  FULLTEXT KEY `itemName` (`itemName`,`longDescription`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`itemID`, `itemName`, `briefDescription`, `longDescription`, `supplierID`, `price`, `discountedPrice`, `thumbImage`, `bigImage`, `display`) VALUES
(2, 'Golden Delicious Apples', 'Loose Golden Delicious Apples', 'Loose Golden Delicious Apples Class 1', 1, 0.27, 0.00, 'goldendelicious.jpg', 'goldendeliciousBig.jpg', 3),
(3, 'Conference Pears', 'Loose Conference Pears', 'Loose Green Conference Pears Class 1', 1, 0.32, 0.00, 'pears.jpg', 'pearsBig.jpg', 0),
(4, 'Banana', 'Loose Banana', 'Loose Ripened Banana Class 1', 2, 0.12, 0.00, 'bananas.jpg', 'bananasBig.jpg', 0),
(5, 'Strawberry Pack', 'Pack of British Strawberries', 'Pack of British Strawberries Class 1', 3, 3.00, 1.99, 'strawberries.jpg', 'strawberriesBig.jpg', 3),
(6, 'Green Pepper', 'Loose Green Pepper', 'Loose Ripened Green Pepper Class 1', 4, 0.78, 0.50, 'greenpepper.jpg', 'greenpepperBig.jpg', 3),
(7, 'Garlic', 'Pack of Garlic', 'Pack of 3 Pieces of Garlic', 4, 0.59, 0.00, 'garlic.jpg', 'garlicBig.jpg', 0),
(8, 'Asparagus Tips', 'Class 1 Asparagus Tips', 'Pack of Asparagus Tips Class 1 125G', 4, 2.00, 1.50, 'asparagus.jpg', 'asparagusBig.jpg', 3),
(9, 'Broccoli', 'Loose Broccoli', 'Loose Broccoli Class 1', 4, 0.75, 0.00, 'broccoli.jpg', 'broccoliBig.jpg', 0),
(10, 'Brussel Sprouts', 'Loose Brussel Sprouts', 'Loose Brussel Sprouts Class 1', 4, 0.05, 0.00, 'sprouts.jpg', 'sproutsBig.jpg', 0),
(11, 'Butter', 'Merseyside Butter', 'Merseyside Butter Salted 250G', 5, 1.60, 0.00, 'butter.jpg', 'butterBig.jpg', 2),
(12, 'Pouring Cream', 'Merseyside Pouring Cream', 'Merseyside Pouring Cream 300ML', 5, 1.00, 0.00, 'pouringcream.jpg', 'pouringcreamBig.jpg', 2),
(13, 'Semi Skimmed Milk', 'Merseyside Milk', 'Merseryside Semi Skimmed Milk 4 Pint', 5, 1.09, 0.00, 'milk4pt.jpg', 'milk4ptBig.jpg', 2),
(14, 'Eggs', 'Eggs 6 Pack', 'Mersey Eggs Free Range Pack of 6', 5, 1.90, 1.85, 'eggs6pk.jpg', 'eggs6pkBig.jpg', 0),
(15, 'Cheese', 'Mature Cheddar Cheese', 'Mature Cheddar Cheese 350G', 5, 2.50, 1.99, 'cheesemature.jpg', 'cheesematureBig.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stockcontrol`
--

CREATE TABLE IF NOT EXISTS `stockcontrol` (
  `itemID` int(11) NOT NULL,
  `idealQuantity` int(11) NOT NULL DEFAULT '50',
  `currentQuantity` int(11) NOT NULL,
  `status` enum('Stocked','Medium','Reorder','OutOfStock') NOT NULL DEFAULT 'OutOfStock',
  PRIMARY KEY (`itemID`),
  KEY `currentQuantity` (`currentQuantity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockcontrol`
--

INSERT INTO `stockcontrol` (`itemID`, `idealQuantity`, `currentQuantity`, `status`) VALUES
(2, 50, 100, 'Stocked'),
(3, 50, 40, 'Medium'),
(4, 50, 23, 'Reorder'),
(5, 50, 0, 'OutOfStock'),
(6, 50, 80, 'Stocked'),
(7, 50, 40, 'Medium'),
(8, 50, 100, 'Stocked'),
(9, 50, 25, 'Medium'),
(10, 50, 0, 'OutOfStock'),
(11, 50, 100, 'Stocked'),
(12, 50, 75, 'Stocked'),
(13, 50, 20, 'Reorder'),
(14, 50, 40, 'Medium'),
(15, 50, 50, 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `supplierdeliveries`
--

CREATE TABLE IF NOT EXISTS `supplierdeliveries` (
  `deliveryID` int(11) NOT NULL AUTO_INCREMENT,
  `supplierID` int(11) NOT NULL,
  `dateOfDelivery` date NOT NULL,
  `timeOfDelivery` time DEFAULT NULL,
  PRIMARY KEY (`deliveryID`),
  KEY `supplierID` (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplierID` int(11) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(30) NOT NULL,
  `emailAddress` varchar(80) NOT NULL,
  `contactID` int(11) NOT NULL,
  PRIMARY KEY (`supplierID`),
  KEY `contactID` (`contactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
