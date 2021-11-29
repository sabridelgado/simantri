demo = {
  

  showNotificationWelcome: function(from, align, message) {
    color = 'primary';

    $.notify({
      icon: "fa fa-notification",
      message: message

    }, {
      type: color,
      timer: 2000,
      placement: {
        from: from,
        align: align
      },
      offset:{
        y:80
      }
    });
  },


  showNotificationBerhasil: function(from, align, message) {
    color = 'success';

    $.notify({
      icon: "nc-icon nc-check-2",
      message: message

    }, {
      type: color,
      timer: 2000,
      placement: {
        from: from,
        align: align
      }
    });
  },


  showNotificationGagal: function(from, align, message) {
    color = 'danger';

    $.notify({
      icon: "nc-icon nc-alert-circle-i",
      message: message

    }, {
      type: color,
      timer: 2000,
      placement: {
        from: from,
        align: align
      }
    });
  },



};