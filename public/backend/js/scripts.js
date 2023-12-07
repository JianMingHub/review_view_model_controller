/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

document.addEventListener("DOMContentLoaded", function(){
  // make it as accordion for smaller screens
    if (window.innerWidth < 992) {
    
      // close all inner dropdowns when parent is closed
      document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
        everydropdown.addEventListener('hidden.bs.dropdown', function () {
          // after dropdown is hidden, then find all submenus
            this.querySelectorAll('.submenu').forEach(function(everysubmenu){
              // hide every submenu as well
              everysubmenu.style.display = 'none';
            });
        })
      });
    
      document.querySelectorAll('.dropdown-menu a').forEach(function(element){
        element.addEventListener('click', function (e) {
            let nextEl = this.nextElementSibling;
            if(nextEl && nextEl.classList.contains('submenu')) {	
              // prevent opening link if link needs to open dropdown
              e.preventDefault();
              if(nextEl.style.display == 'block'){
                nextEl.style.display = 'none';
              } else {
                nextEl.style.display = 'block';
              }
    
            }
        });
      })
    }
  // end if innerWidth

  // This is slug
    const getSlug = (title) => {
      //Đổi chữ hoa thành chữ thường
      let slug = title.toLowerCase();

      //Đổi ký tự có dấu thành không dấu
      slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
      slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
      slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
      slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
      slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
      slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
      slug = slug.replace(/đ/gi, "d");
      //Xóa các ký tự đặt biệt
      slug = slug.replace(
          /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
          ""
      );
      //Đổi khoảng trắng thành ký tự gạch ngang
      slug = slug.replace(/ /gi, "-");
      //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
      //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
      slug = slug.replace(/\-\-\-\-\-/gi, "-");
      slug = slug.replace(/\-\-\-\-/gi, "-");
      slug = slug.replace(/\-\-\-/gi, "-");
      slug = slug.replace(/\-\-/gi, "-");
      //Xóa các ký tự gạch ngang ở đầu và cuối
      slug = "@" + slug + "@";
      slug = slug.replace(/\@\-|\-\@|\@/gi, "");
      return slug;
  };

  const slug = document.querySelector(".slug");
  const title = document.querySelector(".title");
  let isChangeSlug = false;

  if (slug) {
      if (slug.value === "") {
          title.addEventListener("keyup", (e) => {
              if (!isChangeSlug) {
                  const titleValue = e.target.value;
                  slug.value = getSlug(titleValue);
              }
          });
      }

      slug.addEventListener("change", () => {
          if (slug.value === "") {
              const title = document.querySelector(".title");
              const titleValue = title.value;
              slug.value = getSlug(titleValue);
          }
          isChangeSlug = true;
      });
  }
}); 
    


