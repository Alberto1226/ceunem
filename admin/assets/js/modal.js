function getDaos(id){
    $("#datos_blog").load("blog.php=?getArticulo=updateBlogModal&id="+id);
}