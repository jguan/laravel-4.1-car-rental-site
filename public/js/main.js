$(function() {
    $( "#pickup" ).datepicker({
      defaultDate: 0,
      dateFormat: "yy-mm-dd",
      minDate: 0,
      showOn: "button",
      buttonImage: "/img/calendar.gif",
      buttonImageOnly: true,
      autoSize: true,
      onClose: function( selectedDate ) {
        $( "#dropoff" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#dropoff" ).datepicker({
      defaultDate: 0,
      dateFormat: "yy-mm-dd",
      minDate: 0,
      showOn: "button",
      buttonImage: "/img/calendar.gif",
      buttonImageOnly: true,
      autoSize: true,
      onClose: function( selectedDate ) {
        $( "#pickup" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });