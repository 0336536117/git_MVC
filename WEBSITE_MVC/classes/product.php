<?
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    include_once ($filepath.'/../classes/brand.php');
    include_once ($filepath.'/../classes/category.php');
?>

<?php
 class product{
    private $db;
    private $fm;
    public function __construct(){

        $this->db = new Database();
        $this->fm = new Format();
 }
    public function insert_product($data,$files){

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
//kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "" ){
            $alert = "Thêm FILE không thành công";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(productName,brandid,catid,product_desc,price,type,image) VALUES ('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Thêm sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Thêm sản phẩm không thành công</span>";
                return $alert;
            }
        }
    }
    public function show_product(){
        // $query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName 
        // FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.catid 
        // INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.brandid 
        // ORDER BY tbl_product.productid desc";
        $query = "SELECT p.*,c.catName,b.brandName 
        FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.catid = c.catid 
        AND p.brandid = b.brandid 
        ORDER BY p.productid desc";

        // $query = "SELECT * FROM tbl_product ORDER BY productid desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function  update_product($data,$files,$id){

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
//kiểm tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "" ){
            $alert = "Bạn không thể để trống";
            return $alert;
        } else {
        if(!empty($file_name)){
            //Nếu người dùng chọn ảnh
            if($file_size > 2048000) {
            $alert = "<span class='error'>Size hình ảnh phải nhỏ hơn 2MB!</span>";
                return $alert;
        } else if(in_array($file_ext, $permited) == false) {
            $alert = "<span class='error'>Bạn chỉ có thể tải lên:-".implode(',', $permited)."</span>";
            return $alert;
        }
        $query = "UPDATE tbl_product SET 
        productName = '$productName',
        brandid = '$brand',
        catid = '$category',
        type = '$type',
        price = '$price',
        image = '$unique_image',
        product_desc = '$product_desc'
        WHERE productid = '$id'";

    } else{
        // Nếu người dùng ko chọn ảnh
        $query = "UPDATE tbl_product SET 
        productName = '$productName',
        brandid = '$brand',
        catid = '$category',
        type = '$type',
        price = '$price',
        product_desc = '$product_desc'
        WHERE productid = '$id'";
    }
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Sửa sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Sửa sản phẩm không thành công</span>";
                return $alert;
            }
        } 
    }
    public function del_product($id){
        $query = "DELETE FROM tbl_product WHERE productid='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa sản phẩm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Xóa sản phẩm không thành công</span>";
        return $alert;
    }
    }

    public function getproductbyId($id){
        $query = "SELECT * FROM tbl_product WHERE productid='$id'";
        $result = $this->db->select($query);
        return $result;
    }
 // END backend
    public function getproduct_feathered(){
        $query = "SELECT * FROM tbl_product WHERE type='1' LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproduct_new(){
        $query = "SELECT * FROM tbl_product ORDER by productid DESC LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName 
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catid = tbl_category.catid 
        INNER JOIN tbl_brand ON tbl_product.brandid = tbl_brand.brandid WHERE tbl_product.productid = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getlastestDau(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '23' ORDER by productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getlastestCam(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '27' ORDER by productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getlastestXoai(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '24' ORDER by productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getlastestBo(){
        $query = "SELECT * FROM tbl_product WHERE brandid = '29' ORDER by productid DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
