<script language="JavaScript">
  function selectAll(theForm) {
    var obj = document.getElementsByName("nid[]");
    for (var i = 0; i < obj.length; i++) {
      if (obj[i].disabled == false) {
        obj[i].checked = true;
      }
    }
  }

  function selectNone(theForm) {
    var obj = document.getElementsByName("nid[]");
    for (var i = 0; i < obj.length; i++) {
      obj[i].checked = false;
    }
  }

  function delSelect(theForm) {
    var obj = document.getElementsByName("nid[]");
    var flag = false;
    for (var i = 0; i < obj.length; i++) {
      if (obj[i].checked) {
        flag = true;
        break;
      }
    }
    if (flag) {
      if (confirm("刪除無法復原,確定要刪除?")) {
        theForm.Action.value = "del";
        theForm.submit();
      }
    } else {
      alert("請至少選擇一個刪除項目！");
    }
  }

</script>
  <input name="button" type="button" class="btn btn-outline-secondary" value="全選" onclick="selectAll(this.form);">
  <input name="button2" type="button" class="btn btn-outline-secondary" value="取消全選" onclick="selectNone(this.form);">
  <input name="Del" type="button" class="btn btn-outline-secondary" value="刪除" onclick="delSelect(this.form);">
  <input type="hidden" name="Action" value="ok">
