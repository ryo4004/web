function playCount(key,list) {
  var id = list[key];
  $.ajax({
    type : "POST",
    url : "ajax.php",
    data: {
      "id" : id
    }
  }).done(function(data, datatype){
    $('#count'+key).html(data);
  }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
    // だるい
  });
}
