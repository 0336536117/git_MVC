<?php
$filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>

<?php
 class cart{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
 }
 public function add_to_cart($id,$quantity){
    $quantity= $this->fm->validation($quantity);
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $sid = session_id();
    $query = "SELECT * FROM tbl_product WHERE productid = '$id'";
    $result = $this->db->select($query)->fetch_assoc();
    $image = $result["image"];
    $price = $result["price"];
    $productName = $result["productName"];

    // $check_cart = "SELECT * FROM tbl_cart WHERE productid = '$id' AND sid = 'sid'";
    // if($check_cart){
    //     $msg = "Sản phẩm đã tồn tại trong giỏ hàng";
    //     return $msg;
    // } else {
    
            $query_insert = "INSERT INTO tbl_cart(productid,quantity,sid,image,price,productName) VALUES ('$id','$quantity','$sid','$image','$price','$productName')";
            $insert_cart = $this->db->insert($query_insert);
            if($insert_cart){
                header('Location:cart.php');   
                // return $alert; 
            } else {
                header ('Location:404.php');
                // return $alert;              
              }
        }
//  }
 public function get_product_cart(){
    $sid = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
    $result = $this->db->select($query);
    return $result;
 }
 public function update_quantity_cart($cartid,$quantity){
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $cartid = mysqli_real_escape_string($this->db->link, $cartid);
    $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartid = '$cartid'";
      $result = $this->db->update($query);
      if($result){
        $msg = "<span style='color:green;font-size:18px'>Thêm số lượng sản phẩm thành công</span><br>";
        return $msg;
      } else {
        $msg = "<span>Thêm số lượng sản phẩm không thành công</span>";
        return $msg;
      }
      // return $result;
 }
 public function del_product_cart($cartid){
    $cartid = mysqli_real_escape_string($this->db->link, $cartid);
    $query = "DELETE FROM tbl_cart WHERE cartid = '$cartid'";
    $result = $this->db->delete($query);
    if($result){
      header ('Location:cart.php');
    } else {
      $msg = "<span>Xóa sản phẩm không thành công</span>";
      return $msg;
    }
 }
 public function check_cart(){
  $sid = session_id();
  $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
  $result = $this->db->select($query);
  return $result;
 }
 public function check_order($customer_id){
  $sid = session_id();
  $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
  $result = $this->db->select($query);
  return $result;
 }
 public function del_all_data_cart(){
  $sid = session_id();
  $query = "DELETE FROM tbl_cart WHERE sid = '$sid'";
  $result = $this->db->select($query);
  return $result;
 }
 public function insertOrder($customer_id){
  $sid = session_id();
  $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
  $get_product = $this->db->select($query);
if($get_product){
  while($result = $get_product->fetch_assoc()){
    $productid = $result['productid'];
    $productName = $result['productName'];
    $quantity = $result['quantity'];
    $price = $result['price'] * $quantity;
    $image = $result['image'];
    $customer_id = $customer_id;
    $query_order = "INSERT INTO tbl_order(productid,productName,quantity,price,image,customer_id) VALUES ('$productid','$productName','$quantity','$price','$image',$customer_id)";
    $insert_order = $this->db->insert($query_order);

  }
} 
}
public function getAmountPrice($customer_id){
  $query = "SELECT price FROM tbl_order WHERE customer_id  = '$customer_id'";
  $get_price = $this->db->select($query);
  return $get_price;
}
public function get_cart_ordered($customer_id){
  $query = "SELECT * FROM tbl_order WHERE customer_id  = '$customer_id'";
  $get_cart_ordered = $this->db->select($query);
  return $get_cart_ordered;
}
public function get_inbox_cart(){
  $query = "SELECT * FROM tbl_order ORDER BY date_order";
  $get_inbox_cart = $this->db->select($query);
  return $get_inbox_cart;
}
 }
?>