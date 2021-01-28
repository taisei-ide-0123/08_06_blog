'use strict';

$(function () {
  $('#heart').on('click', function () {
    $(this).addClass('selected');
    $(this).siblings().removeClass('selected');
  });
})