$(document).ready(function () {
  // Default Datatable
  $("#datatable").DataTable({
    order: [],
    autoWidth: false,
    columnDefs: [
      {
        targets: ["nosort"],
        orderable: false,
      },
    ],
  });
  setTimeout(function () {
    $(".notify-alert").fadeOut();
  }, 2000);
});

function changeglobal(id, properties) {
  var control = $("#" + properties + id).attr("data-control");
  var global = 0;
  if ($("#" + properties + id).is(":checked")) {
    global = 1;
  }
  if (id != " ") {
    $.ajax({
      url: "Cpanel/" + control + "/checkglobals",
      method: "post",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      data: { id: id, global: global, properties: properties },
      success: function (data) {
        if (data) {
          if (isJsonString(data)) {
            const extraJson = JSON.parse(data);
            if (extraJson.type === "error") {
              Swal.fire({
                icon: "error",
                title: "Bạn không có quyền truy cập chức năng này?",
                type: "error",
              });
            } else if (extraJson.type === "successful") {
              $.toast({
                heading: "Thông báo!",
                text: "Cập nhật trạng thái hiển thị thành công!.",
                position: "top-right",
                loaderBg: "#5ba035",
                icon: "success",
                hideAfter: 1000,
                // stack: 1
              });
            }
          }
        }
      },
    });
  }
}

function changeProminent(id, properties) {
  var control = $("#" + properties + id).attr("data-control");
  var global = 0;
  if ($("#" + properties + id).is(":checked")) {
    global = 1;
  }
  if (id != " ") {
    $.ajax({
      url: "Cpanel/" + control + "/changeProminent",
      method: "post",
      headers: { "X-Requested-With": "XMLHttpRequest" },
      data: { id: id, global: global, properties: properties },
      success: function (data) {
        if (data) {
          if (isJsonString(data)) {
            const extraJson = JSON.parse(data);
            if (extraJson.type === "error") {
              Swal.fire({
                icon: "error",
                title: "Bạn không có quyền truy cập chức năng này?",
                type: "error",
              });
            } else if (extraJson.type === "successful") {
              $.toast({
                heading: "Thông báo!",
                text: "Cập nhật trạng thái hiển thị thành công!.",
                position: "top-right",
                loaderBg: "#5ba035",
                icon: "success",
                hideAfter: 1000,
                // stack: 1
              });
            }
          }
        }
      },
    });
  }
}

function deleteAll(control) {
  var list_id = "";
  // var success = confirm("are you sure");
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa không?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý",
  }).then(function (e) {
    if (e.value) {
      $("input[name='foo']").each(function () {
        if (this.checked) {
          if ($(this).is(":checked")) {
            $(this).parent().parent().remove();
          }
          list_id = list_id + "," + this.value;
        }
      });
      list_id = list_id.substr(1);
      if (list_id != "") {
        $.ajax({
          url: "cpanel/" + control + "/deleteAll",
          method: "POST",
          data: { list_id: list_id },
          success: function (data) {
            if (data) {
              if (isJsonString(data)) {
                const extraJson = JSON.parse(data);
                if (extraJson.type === "error") {
                  Swal.fire({
                    icon: "error",
                    title: "Bạn không có quyền truy cập chức năng này?",
                    type: "error",
                  });
                } else if(extraJson.result == "successfully") {
                  Swal.fire("Xóa thành công!", "", "success");
                }
              } else {
                  Swal.fire("Xóa thành công!", "", "success");
              }
            }
          },
        });
      }
    }
  });
}
function deleteAll2(control) {
  var list_id = "";
  // var success = confirm("are you sure");
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa không?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý",
  }).then(function (e) {
    if (e.value) {
      $("input[name='foo']").each(function () {
        if (this.checked) {
          if ($(this).is(":checked")) {
            $(this).parent().parent().remove();
          }
          list_id = list_id + "," + this.value;
        }
      });
      list_id = list_id.substr(1);
      if (list_id != "") {
        $.ajax({
          url: "cpanel/" + control + "/deleteAll",
          method: "POST",
          data: { list_id: list_id },
          success: function (data) {
            if (data) {
              if (isJsonString(data)) {
                const extraJson = JSON.parse(data);
                if (extraJson.type === "error") {
                  Swal.fire({
                    icon: "error",
                    title: "Bạn không có quyền truy cập chức năng này?",
                    type: "error",
                  });
                } else if(extraJson.result == "successfully") {
                  Swal.fire("Xóa thành công!", "", "success");
                }
              } else {
                  Swal.fire("Xóa thành công!", "", "success");
              }
            }
          },
        });
      }
    }
  });
}

function del(id) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa không?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý",
  }).then(function (result) {
    if (result.value) {
      var control = $("#delete" + id).attr("data-control");
      if (id != "") {
        $.ajax({
          method: "POST",
          url: "cpanel/" + control + "/delete",
          data: { id: id },
          success: function (data) {
            console.log(data);

            if (data != "") {
              if (isJsonString(data)) {
                const extraJson = JSON.parse(data);
                if (extraJson.type === "error") {
                  Swal.fire({
                    icon: "error",
                    title: "Bạn không có quyền truy cập chức năng này?",
                    type: "error",
                  });
                }
              } else {
                Swal.fire("Xóa thành công!", "", "success");
                $("#delete" + id)
                  .parent()
                  .parent()
                  .fadeOut();
                $(".tr" + id).remove();
              }
            } else {
							$('#delete' + id).parent().parent().fadeOut();
							Swal.fire("Xóa thành công!", "", "success");
							$(".tr" + id).remove();
						} 
          },
        });
      }
    }
  });
}

function del2(id) {
  let parent = $(".parent" + id).attr("data-parentid");
  let control = $("#delete" + id).attr("data-control");
  if (parent != undefined) {
    $(".popup-form").css("display", "flex");
    $("button#close").click(function (e) {
      e.preventDefault();
      $(".popup-form").hide();
    });
    // $(".popup-form").click(function(){
    //     $(".popup-form").hide();
    // });
    $("button#" + control).click(function (e) {
      e.preventDefault();
      let val = $("input[name=parentid]:checked").val();
      let num = parseInt(val);
      $.ajax({
        method: "POST",
        url: "cpanel/" + control + "/delete_option",
        data: { id: id, num: num },
        dataType: "json",
        success: function (data) {
          if (data.result == "success") {
            // Swal.fire("Xóa thành công!", "", "success");
            $(".popup-form").hide();
            location.reload();
          }
        },
      });
    });
  } else {
    Swal.fire({
      title: "Bạn có chắc chắn muốn xóa không?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Đồng ý",
    }).then(function (result) {
      if (result.value) {
        var control = $("#delete" + id).attr("data-control");
        if (id != "") {
          $.ajax({
            method: "POST",
            url: "cpanel/" + control + "/delete",
            data: { id: id },
            success: function (data) {
              if (data != "") {
                let parseData = JSON.parse(data);
                if (parseData.type == "error") {
                  Swal.fire(
                    "Bạn không đủ quyền thực hiện tác vụ này!",
                    "",
                    "error"
                  );
                }
              } else {
                $("#delete" + id)
                  .parent()
                  .parent()
                  .fadeOut();
                Swal.fire("Xóa thành công!", "", "success");
                $(".tr" + id).remove();
              }
            },
          });
        }
      }
    });
  }
}

function createSlug(slug) {
  var slug = slug.value;
  var control = $("#name").attr("data-control");
  if (slug) {
    $.ajax({
      method: "POST",
      url: "cpanel/" + control + "/createSlug",
      data: { slug: slug },
      dataType: "json",
      success: function (data) {
        if (data.slug) {
          $("#alias").val(data.slug);
        }
      },
    });
  }
}

function changeSort(sort, id) {
  var control = $("#sort" + id).attr("data-control");
  var sort = sort.value;
  if (id != "") {
    $.ajax({
      method: "POST",
      url: "cpanel/" + control + "/sort",
      data: { id: id, sort: sort },
      dataType: "json",
      success: function (data) {
        if (data.type === "error") {
          Swal.fire({
            icon: "error",
            title: "Bạn không có quyền truy cập chức năng này?",
            type: "error",
          });
        } else if (data.rs == 1) {
          $.toast({
            text: "Cập nhật thứ tư thành công!",
            position: "top-right",
            loaderBg: "#ff6849",
            icon: "success",
            hideAfter: 2000,
            stack: 6,
          });
        }
      },
    });
  }
}

//
function FormatNumber(num) {
  var pattern = "0123456789.";
  var len = num.value.length;
  if (len != 0) {
    var index = 0;

    while (index < len && len != 0)
      if (pattern.indexOf(num.value.charAt(index)) == -1) {
        if (index == len - 1) num.value = num.value.substring(0, len - 1);
        else if (index == 0) num.value = num.value.substring(1, len);
        else
          num.value =
            num.value.substring(0, index) + num.value.substring(index + 1, len);
        index = 0;
        len = num.value.length;
      } else index++;
  }
  val = num.value;
  val = val.replace(/[^\d.]/g, "");
  arr = val.split(".");
  lftsde = arr[0];
  rghtsde = arr[1];
  result = "";
  lng = lftsde.length;
  j = 0;
  for (i = lng; i > 0; i--) {
    j++;
    if (j % 3 == 1 && j != 1) {
      result = lftsde.substr(i - 1, 1) + "," + result;
    } else {
      result = lftsde.substr(i - 1, 1) + result;
    }
  }
  if (rghtsde == null) {
    num.value = result;
  } else {
    num.value = result + "." + arr[1];
  }
}
// format money

function del_image(id, properties) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa không?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý",
  }).then(function (e) {
    if (e.value) {
      $.ajax({
        url: "cpanel/" + properties + "/del_image",
        method: "POST",
        data: { id: id },
        success: function (data) {
          if (data) {
            if (isJsonString(data)) {
              const extraJson = JSON.parse(data);
              if (extraJson.type === "error") {
                Swal.fire({
                  icon: "error",
                  title: "Bạn không có quyền truy cập chức năng này?",
                  type: "error",
                });
              } else if (extraJson.result === "success") {
                $.toast({
                  heading: "Thông báo!",
                  text: "Xóa thành công!.",
                  position: "top-right",
                  loaderBg: "#5ba035",
                  icon: "success",
                  hideAfter: 1000,
                  // stack: 1
                });
                $("#preview").attr("src", "assets/images/no_img.png");
              }
            }
          }
        },
      });
    }
  });
}
function del_image2(id, properties, image_name, thumb_name, preview) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa không?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý",
  }).then(function (e) {
    if (e.value) {
      $.ajax({
        url: "cpanel/" + properties + "/del_image2",
        method: "POST",
        data: { id: id, image_name: image_name, thumb_name: thumb_name },
        success: function (data) {
          if (data) {
            if (isJsonString(data)) {
              const extraJson = JSON.parse(data);
              if (extraJson.type === "error") {
                Swal.fire({
                  icon: "error",
                  title: "Bạn không có quyền truy cập chức năng này?",
                  type: "error",
                });
              } else if (extraJson.result === "success") {
                $.toast({
                  heading: "Thông báo!",
                  text: "Xóa thành công!.",
                  position: "top-right",
                  loaderBg: "#5ba035",
                  icon: "success",
                  hideAfter: 1000,
                  // stack: 1
                });
                $("#" + preview).attr("src", "assets/images/no_img.png");
              }
            }
          }
        },
      });
    }
  });
}

function del_image_banner(id, properties, key, div_load_img) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa không?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Đồng ý",
  }).then(function (e) {
    if (e.value) {
      $.ajax({
        url: "cpanel/" + properties + "/del_image",
        method: "POST",
        data: { id: id, key: key },
        success: function (data) {
          if (data) {
            if (isJsonString(data)) {
              const extraJson = JSON.parse(data);
              if (extraJson.type === "error") {
                Swal.fire({
                  icon: "error",
                  title: "Bạn không có quyền truy cập chức năng này?",
                  type: "error",
                });
              } else if (extraJson.result === "success") {
                $.toast({
                  heading: "Thông báo!",
                  text: "Xóa thành công!.",
                  position: "top-right",
                  loaderBg: "#5ba035",
                  icon: "success",
                  hideAfter: 1000,
                  // stack: 1
                });
                $("#" + div_load_img).attr("src", "assets/images/no_img.png");
              }
            }
          }
        },
      });
    }
  });
}

// Handle for add and edit module
function ActionFn(type, __this) {
  if (type == "add") {
    let Count_item_addaction =
      document.querySelectorAll(".item__group").length - 1;
    let numbCount = ++Count_item_addaction;
    let sort = ++numbCount;
    $(".action_item").append(`<div class="form-group item__group d-flex">
                                    <div class="item__col col-md-4">
                                        <input type="text" class="form-control w-full" id="action"
                                            name="data_module_detail[${numbCount}][name_action]" placeHolder="tên" value="" required="">
                                    </div>
                                    <div class="item__col col-md-4">
                                        <input type="text" class="form-control  w-full" id="action"
                                            name="data_module_detail[${numbCount}][action]"  placeHolder="tên action" value="" required="">
                                    </div>
                                    <div class="item__col col-md-3 d-flex">
                                        <button type="button" onclick="ActionFn('delete',this)"  class="del_btn btn btn-dark waves-effect waves-light"> <i  class="fas fa-trash-alt "></i></button>
                                        <input type="text" placeholder="sắp xếp"  class="form-control ml-2  col-4 "  name="data_module_detail[${numbCount}][sort]" value="${sort}">
                                    </div>
                                 </div>`);
  } else if (type == "delete") {
    $(__this).closest(".item__group").remove();
  }
}

// Update Permission
function updatePermission(
  method,
  moduleID,
  controller,
  action,
  roleID,
  moduleID
) {
  const isChecked = $("#" + action + moduleID).attr("checked");
  let checked = 0;
  if (isChecked == undefined) {
    // uncheck to checked
    $("#" + action + moduleID).attr("checked", "checked");
    checked = 1;
  } else {
    // checked to uncheck
    $("#" + action + moduleID).removeAttr("checked");
    checked = 0;
  }

  $.ajax({
    method: "POST",
    url: "cpanel/role/" + method,
    data: {
      moduleID: moduleID,
      controller: controller,
      action: action,
      roleID: roleID,
      moduleID: moduleID,
      isChecked: checked,
    },
    success: function (data) {
      if (isJsonString(data)) {
        const extraJson = JSON.parse(data);
        if (extraJson.type === "error") {
          Swal.fire({
            icon: "error",
            title: "Bạn không có quyền truy cập chức năng này?",
            type: "error",
          });
        }
      }
    },
  });
}

// Check a string is JSON
function isJsonString(jsonString) {
  try {
    JSON.parse(jsonString);
  } catch (e) {
    return false; // It's not a valid JSON format
  }
  return true; // It's a valid JSON format
}
