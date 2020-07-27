var maskList = $.masksSort($.masksLoad("https://cdn.rawgit.com/andr-04/inputmask-multi/master/data/phone-codes.json"), ['#'], /[0-9]|#/, "mask");
var maskOpts = {
  inputmask: {
    definitions: {
      '#': {
        validator: "[0-9]",
        cardinality: 1
      }
    },
    showMaskOnHover: false,
    autoUnmask: true,
    clearMaskOnLostFocus: false
  },
  match: /[0-9]/,
  replace: '#',
  list: maskList,
  listKey: "mask",
  onMaskChange: function(maskObj, determined) {
    if (determined) {
      var hint = maskObj.name_en;
      if (maskObj.desc_en && maskObj.desc_en != "") {
        hint += " (" + maskObj.desc_en + ")";
      }
      $("#descr").html(hint);
    } else {
      $("#descr").html("Mask of input");
    }
  }
};

$('#phone_mask').change(function() {
  $('#phone').inputmask("remove");
  $('#phone').inputmasks(maskOpts);
});

$('#phone_mask').change();