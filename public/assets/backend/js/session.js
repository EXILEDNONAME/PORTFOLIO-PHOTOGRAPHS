
var taTimeout = 1000;
/*
Handle raised idle/active events
*/
$("#elStatus").on("idle.idleTimer", function(event, elem, obj) {
  //If you dont stop propagation it will bubble up to document event handler
  event.stopPropagation();

  $("#elStatus")
  .val(function(i, v) {
    return v + "Idle @ " + moment().format() + " \n";
  });
  // .removeClass("alert-success")
  // .addClass("alert-warning")
  // .scrollTop($("#elStatus")[0].scrollHeight);

});

$("#elStatus").on("active.idleTimer", function(event) {
  //If you dont stop propagation it will bubble up to document event handler
  event.stopPropagation();

  $("#elStatus")
  .val(function(i, v) {
    var last_activity = $("#elStatus").idleTimer("getLastActiveTime");
    return fetch("/dashboard/store-session/" + last_activity);
  });
  // .addClass("alert-success")
  // .removeClass("alert-warning")
  // .scrollTop($("#elStatus")[0].scrollHeight);
});

/*
Handle button events
*/
$("#btReset").click(function() {
  $("#elStatus")
  .idleTimer("reset")
  .val(function(i, v) {
    return v + "Reset @ " + moment().format() + " \n";
  })
  .scrollTop($("#elStatus")[0].scrollHeight);

  //Apply classes for default state
  if ($("#elStatus").idleTimer("isIdle")) {
    $("#elStatus")
    .removeClass("alert-success")
    .addClass("alert-warning");
  } else {
    $("#elStatus")
    .addClass("alert-success")
    .removeClass("alert-warning");
  }
  $(this).blur();
  return false;
});

$("#btRemaining").click(function() {
  $("#elStatus")
  .val(function(i, v) {
    return v + "Remaining: " + $("#elStatus").idleTimer("getRemainingTime") + " \n";
  })
  .scrollTop($("#elStatus")[0].scrollHeight);
  $(this).blur();
  return false;
});

$("#btLastActive").click(function() {
  $("#elStatus")
  .val(function(i, v) {
    return v + "LastActive: " + $("#elStatus").idleTimer("getLastActiveTime") + " \n";
  })
  .scrollTop($("#elStatus")[0].scrollHeight);
  $(this).blur();
  return false;
});

$("#btState").click(function() {
  $("#elStatus")
  .val(function(i, v) {
    return v + "State: " + ($("#elStatus").idleTimer("isIdle") ? "idle" : "active") + " \n";
  })
  .scrollTop($("#elStatus")[0].scrollHeight);
  $(this).blur();
  return false;
});

//Clear value if there was one cached & start time
$("#elStatus").val("").idleTimer(taTimeout);

//For demo purposes, show initial state
if ($("#elStatus").idleTimer("isIdle")) {
  $("#elStatus")
  .val(function(i, v) {
    return v + "Initial Idle @ " + moment().format() + " \n";
  })
  .removeClass("alert-success")
  .addClass("alert-warning")
  .scrollTop($("#elStatus")[0].scrollHeight);
} else {
  $("#elStatus")
  .val(function(i, v) {
    return v + "Initial Active @ " + moment().format() + " \n";
  });
  // .addClass("alert-success")
  // .removeClass("alert-warning")
  // .scrollTop($("#elStatus")[0].scrollHeight);
}

// Display the actual timeout on the page
$("#elTimeout").text(taTimeout / 1000);
