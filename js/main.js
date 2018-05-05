// Карусель в услуг
$('.carousel').carousel();

// Плагин для картинок
$(function(){
  $.superbox.settings = {
    boxId: "superbox", // Id attribute of the "superbox" element
    boxClasses: "", // Class of the "superbox" element
    overlayOpacity: .6, // Background opaqueness
    boxWidth: "400", // Default width of the box
    boxHeight: "300", // Default height of the box
    loadTxt: "Подождите пожалуйста...", // Loading text
    closeTxt: "Закрыть", // "Close" button text
    prevTxt: "Предыдущая", // "Previous" button text
    nextTxt: "Следующая" // "Next" button text
  };

  $.superbox();
});