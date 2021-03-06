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
            if($result){
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
 public function del_all_data_cart(){
  $sid = session_id();
  $query = "DELETE FROM tbl_cart WHERE sid = '$sid'";
  $result = $this->db->select($query);
  return $result;
 }
}
?>