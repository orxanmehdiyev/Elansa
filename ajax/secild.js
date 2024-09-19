  function MetinInputAlaniYazildi(deyer) {
    InputIcerikDeyeri=document.getElementById(deyer);
    if (InputIcerikDeyeri.value.length > InputIcerikDeyeri.maxLength) 
      InputIcerikDeyeri.value = InputIcerikDeyeri.value.slice(0, InputIcerikDeyeri.maxLength)
    var InputLabelMetni=deyer+"_metni";
    if (InputIcerikDeyeri.value == "") {      
      document.getElementById(InputLabelMetni).style.color = "#ff0000";
      InputIcerikDeyeri.style.color = "#ff0000";
      InputIcerikDeyeri.style.borderColor = "#ff0000";
      InputIcerikDeyeri.style.boxShadow = " 1px 0px 1px 0px #ff0000";
      InputIcerikDeyeri.classList.add("pleysoldercolorqirmizi");
      return;
    } else {
      document.getElementById(InputLabelMetni).style.color = "#495057";
      InputIcerikDeyeri.style.color = "#495057";
      InputIcerikDeyeri.style.borderColor = "#ced4da";
      InputIcerikDeyeri.style.boxShadow = " 0px 0px 0px 0px #ced4da";
      InputIcerikDeyeri.classList.remove("pleysoldercolorqirmizi");
      var Yoxla = InputIcerikDeyeri.value;      
      var YoxlanisNeticesi = Yoxla.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜüƏə\/\-()\s+]/g, "");
      InputIcerikDeyeri.value = YoxlanisNeticesi;
      return;
    }
  }

  /*SIlinecek*/
  function ReqemInputAlani(deyer) {
    InputIcerikDeyeri=document.getElementById(deyer);
    if (InputIcerikDeyeri.value.length > InputIcerikDeyeri.maxLength) 
      InputIcerikDeyeri.value = InputIcerikDeyeri.value.slice(0, InputIcerikDeyeri.maxLength)
    var InputLabelMetni=deyer+"_metni";
    if (InputIcerikDeyeri.value == "") {      
      document.getElementById(InputLabelMetni).style.color = "#ff0000";
      InputIcerikDeyeri.style.color = "#ff0000";
      InputIcerikDeyeri.style.borderColor = "#ff0000";
      InputIcerikDeyeri.style.boxShadow = " 1px 0px 1px 0px #ff0000";
      InputIcerikDeyeri.classList.add("pleysoldercolorqirmizi");
      return;
    } else {
      document.getElementById(InputLabelMetni).style.color = "#495057";
      InputIcerikDeyeri.style.color = "#495057";
      InputIcerikDeyeri.style.borderColor = "#ced4da";
      InputIcerikDeyeri.style.boxShadow = " 0px 0px 0px 0px #ced4da";
      InputIcerikDeyeri.classList.remove("pleysoldercolorqirmizi");
      var Yoxla = InputIcerikDeyeri.value;      
      var YoxlanisNeticesi = Yoxla.replace(/[^0-9]/g, "");
      InputIcerikDeyeri.value = YoxlanisNeticesi;
      return;
    }
  }
  /*silinecek*/

  function ReqemYazildi(deyer) {
    InputIcerikDeyeri=document.getElementById(deyer);
    if (InputIcerikDeyeri.value.length > InputIcerikDeyeri.maxLength) ;
    InputIcerikDeyeri.value = InputIcerikDeyeri.value.slice(0, InputIcerikDeyeri.maxLength);
    if (InputIcerikDeyeri.value == "") {      
      if (document.querySelector('[for='+deyer+']')) {
        document.querySelector('[for='+deyer+']').style.color  = "#ff0000";
      }
      InputIcerikDeyeri.style.color = "#ff0000";
      InputIcerikDeyeri.style.borderColor = "#ff0000";
      InputIcerikDeyeri.style.boxShadow = " 1px 0px 1px 0px #ff0000";
      InputIcerikDeyeri.classList.add("pleysoldercolorqirmizi");
      return;
    } else {
     if (document.querySelector('[for='+deyer+']')) {
      document.querySelector('[for='+deyer+']').style.color  = "#495057";
    }
    InputIcerikDeyeri.style.color = "#495057";
    InputIcerikDeyeri.style.borderColor = "#ced4da";
    InputIcerikDeyeri.style.boxShadow = " 0px 0px 0px 0px #ced4da";
    InputIcerikDeyeri.classList.remove("pleysoldercolorqirmizi");
    var Yoxla = InputIcerikDeyeri.value;      
    var YoxlanisNeticesi = Yoxla.replace(/[^0-9]/g, "");
    InputIcerikDeyeri.value = YoxlanisNeticesi;
    return;
  }
}

function SagVeSolBosluklariSIl(deyer){
  InputIcerikDeyeri=document.getElementById(deyer);
  var Yoxlabir = InputIcerikDeyeri.value;   
  var Yoxla=Yoxlabir.trim();  
  InputIcerikDeyeri.value = Yoxla;
}
/* silinecek*/
function SelectInputAlaniSecildi(id) {
  var InputLabelMetni=id+"_metni";
  document.getElementById(InputLabelMetni).style.color = "#495057";
  document.getElementById(id).style.color = "#495057";
  document.getElementById(id).style.borderColor = "#ced4da";
  document.getElementById(id).style.boxShadow = "1px 0px 1px 0px #ced4da";
}
/* silinecek*/


function SecimAlaniSecildi(deyer) {
  if (document.querySelector('[for='+deyer+']')) {
    document.querySelector('[for='+deyer+']').style.color  = "#495057";
  }
  document.getElementById(deyer).style.color = "#495057";
  document.getElementById(deyer).style.borderColor = "#ced4da";  
  document.getElementById(deyer).style.boxShadow = "1px 0px 1px 0px #ced4da";
}
function KiraTemizle(){
  if (document.getElementById("kirabolmesi")) {
   document.getElementById("kirabolmesi").innerHTML="";
 }        
}

function KiraYaz(){
  if (document.getElementById("kirabolmesi")) {
   document.getElementById("kirabolmesi").innerHTML="";
   document.getElementById("kirabolmesi").innerHTML=`
   <div class="form-group col-6">
   <label for="avtomobil_markasi_id"><span>*</span>Kira</label>                
   <select name="avtomobil_markasi_id" tabindex="2" required="required"  id="avtomobil_markasi_id" class="form-control" onchange="">
   <option disabled="disabled" value=""  selected="selected"> Secin...</option>                      
   <option value="gunluk">Günlük</option>
   <option value="ayliq">Aylıq</option>              
   </select>
   </div>
   `;
 }        
}


/*=======================================Kataqoriya Tələb edir başlayır====================*/
function KataqoriyaSec(deyer) {
  var Elan_Meksedi;
  var Satis=document.getElementById("satis");
  var Kira=document.getElementById("kira");  
  if (Satis.checked === true) {
    Elan_Meksedi=1;
  }else{
    Elan_Meksedi=0;
  }

  if (Kira.checked === true) {
    Elan_Meksedi=0;
  }else{
    Elan_Meksedi=1;
  }
  document.getElementById("yuklemealanikapsayici").style.display = "block";
  if (deyer==1) {  
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "Avtomobil_Elani/YeniElan.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Deyer=" + Elan_Meksedi);
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("yuklemealanikapsayici").style.display = "none";
        var cavab=this.responseText.trim();
        document.getElementById("icerik").innerHTML="";
        document.getElementById("icerik").innerHTML= cavab;
        let rotation = 0;
        function rotateImg(e) {
          rotation += 90; 
          if (rotation === 360) {                       
            rotation = 0;
          }
          e.previousElementSibling.style.transform = `rotate(${rotation}deg)`;
        } 
        function remove_image(e){
          var rr=e.previousElementSibling;
          var dd=rr.previousElementSibling;
          e.remove();
          dd.remove();
          rr.remove();
        } 
        var viewModel = {};
        viewModel.fileData = ko.observable({
          dataURL: ko.observable(),                          
        });
        viewModel.multiFileData = ko.observable({ dataURLArray: ko.observableArray() });
        viewModel.onClear = function (fileData) {
          if (confirm('Are you sure?')) {
            fileData.clear && fileData.clear();
          }
        };
        viewModel.debug = function () {
          window.viewModel = viewModel;
          console.log(ko.toJSON(viewModel));
          console.log(viewModel.multiFileData())
          console.log(viewModel.multiFileData().dataURLArray());
          console.log(viewModel.multiFileData().fileArray());
          debugger;
        };
        viewModel.onInvalidFileDrop = function(failedFiles) {
          var fileNames = [];
          for (var i = 0; i < failedFiles.length; i++) {
            fileNames.push(failedFiles[i].name);
          }
          var message = 'Invalid file type: ' + fileNames.join(', ');
          alert(message)
          console.error(message);
        };
        ko.applyBindings(viewModel);
      }
    }
  }
  else if(deyer==4){
    var detay = document.getElementById("menzilelani").innerHTML
  }
  else if(deyer==5){
    var detay = document.getElementById("villalar").innerHTML
  }
  else if(deyer==6){
    var detay = document.getElementById("qarajelaniucun").innerHTML
  }
  else if(deyer==7){
    var detay = document.getElementById("obyektelaniucun").innerHTML
  }
  else if(deyer==8){
    var detay = document.getElementById("torpaqsahesielaniucun").innerHTML
  }
  else if(deyer==88){
    var detay = document.getElementById("heyetevleri").innerHTML
  }
  document.getElementById("icerik").innerHTML="";
  document.getElementById("icerik").innerHTML = detay;
  document.getElementById("elan_katoqoriya_id_label").style.color = "#495057";
  document.getElementById("karoqoriya_id").style.color = "#495057";
  document.getElementById("karoqoriya_id").style.borderColor = "#ced4da";
  document.getElementById("karoqoriya_id").style.boxShadow = "1px 0px 1px 0px #ced4da";


  
  
}
/*=======================================Kataqoriya Tələb edir bitir====================*/










/*=======================================Kataqoriya Tələb edir başlayır====================*/
function KataqoriyaTelebEt(deyer) {
  var icerik = document.getElementById("icerik");
  if (deyer==1) {
    var detay = document.getElementById("avtomobilelaniucun").innerHTML
  }
  else if(deyer==4){
    var detay = document.getElementById("menzilelani").innerHTML
  }
  else if(deyer==5){
    var detay = document.getElementById("villalar").innerHTML
  }
  else if(deyer==6){
    var detay = document.getElementById("qarajelaniucun").innerHTML
  }
  else if(deyer==7){
    var detay = document.getElementById("obyektelaniucun").innerHTML
  }
  else if(deyer==8){
    var detay = document.getElementById("torpaqsahesielaniucun").innerHTML
  }
  else if(deyer==88){
    var detay = document.getElementById("heyetevleri").innerHTML
  }
  var sss = document.getElementById("icerik").innerHTML="";
  document.getElementById("icerik").innerHTML = detay;
  document.getElementById("elan_katoqoriya_id_label").style.color = "#495057";
  document.getElementById("karoqoriya_id").style.color = "#495057";
  document.getElementById("karoqoriya_id").style.borderColor = "#ced4da";
  document.getElementById("karoqoriya_id").style.boxShadow = "1px 0px 1px 0px #ced4da";


}
/*=======================================Kataqoriya Tələb edir bitir====================*/































/*===============================Avtomobilin markasına görə mödelini gətirmə başlayır=============*/
function ModelTelebEt(marka_id) {
  var ModeliniTalepEt = new XMLHttpRequest();
  ModeliniTalepEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("avtomobil_model_id").innerHTML = " ";
      document.getElementById("avtomobil_model_id").innerHTML = this.responseText;
      document.getElementById("avtomobil_markasi_id_label").onmouseover = function () {
        this.style.borderColor = "#495057";
      }
      document.getElementById("avtomobil_markasi_id_label").style.color = "#495057";
      document.getElementById("avtomobil_markasi_id").style.color = "#495057";
      document.getElementById("avtomobil_markasi_id").style.borderColor = "#ced4da";
      document.getElementById("avtomobil_markasi_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
    }
  };
  ModeliniTalepEt.open("GET", "anliq_yenileme/avtomodel.php?avotomarka=" + marka_id, true);
  ModeliniTalepEt.send();
}
/*===============================Avtomobilin markasına görə mödelini gətirmə bitir====================*/



/*===============================Avtomobilin markasına görə mödelini gətirmə başlayır=============*/
function MenzilElanlariUcunBinaMertebesiTelebi(mertebesayi) {

  var MertebeTelebEt = new XMLHttpRequest();
  MertebeTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id").innerHTML = " ";
      document.getElementById("Menzil_Elanlari_Ucun_Yerlesdiyi_Mertebe_id").innerHTML = this.responseText;
      document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
      document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").onmouseover = function () {
        this.style.borderColor = "#2A3F54";
      }

      document.getElementById("binaninmertebesayi_label").style.color = "#495057";
      document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").style.color = "#495057";
      document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").style.borderColor = "#ced4da";
      document.getElementById("Menzil_elanlari_ucun_Bina_metrebe_id").style.boxShadow = " 1px 0px 1px 0px #ced4da";
    }
  };
  MertebeTelebEt.open("GET", "anliq_yenileme/mertebesayi.php?mertebe=" + mertebesayi, true);
  MertebeTelebEt.send();
}
/*===============================Avtomobilin markasına görə mödelini gətirmə bitir====================*/




/*===============================sekilsecildi ====================*/
function Elansekilsecildi() {
  alert();

}

/*===============================sekilsecildi ====================*/


/*===============================Dövlət secildi ====================*/
function DovletSecildi(dovlet_id) {
  var SeherTelebEt = new XMLHttpRequest();
  SeherTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("menzilseher").innerHTML = " ";
      document.getElementById("menzilseher").innerHTML = this.responseText;
    }
    document.getElementById("dovlet_id_label").style.color = "#495057";
    document.getElementById("dovlet_id").style.color = "#495057";
    document.getElementById("dovlet_id").style.borderColor = "#ced4da";
    document.getElementById("dovlet_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
    document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
  };
  SeherTelebEt.open("GET", "anliq_yenileme/sehertelebi.php?dovlet_id=" + dovlet_id, true);
  SeherTelebEt.send();
}
/*===============================Dövlət secildi ====================*/



/*===============================Rayonun var olub olmadigini yoxlayir ====================*/
function RayonYoxlanis(dovlet_id) {
  var RayonYoxla = new XMLHttpRequest();
  RayonYoxla.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ryontelebi").innerHTML = " ";
      document.getElementById("ryontelebi").innerHTML = this.responseText;
    }
    document.getElementById("dovlet_id_label").style.color = "#495057";
    document.getElementById("dovlet_id").style.color = "#495057";
    document.getElementById("dovlet_id").style.borderColor = "#ced4da";
    document.getElementById("dovlet_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
    document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
  };
  RayonYoxla.open("GET", "anliq_yenileme/dovlet_secilende_rayon_telebi.php?dovlet_id=" + dovlet_id, true);
  RayonYoxla.send();
}
/*===============================Rayonun var olub olmadigini yoxlayir ====================*/


/*===============================Şəhəri secib rayon tələb edir ====================*/
function SeherSecildi(seher_id) {
  document.getElementById("seher_id_label").style.color = "#495057";
  document.getElementById("seher_id").style.color = "#495057";
  document.getElementById("seher_id").style.borderColor = "#ced4da";
  document.getElementById("seher_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
  document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
  var RayonTelebEt = new XMLHttpRequest();
  RayonTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ryontelebi").innerHTML = " ";
      document.getElementById("ryontelebi").innerHTML = this.responseText;
    }

  };
  RayonTelebEt.open("GET", "anliq_yenileme/rayontelebi.php?seher_id=" + seher_id, true);
  RayonTelebEt.send();
}
/*===============================Şəhəri secib rayon tələb edir ====================*/


/*===============================Metro tələb edir ====================*/
function MetroYoxlanis(seher_id) {
  document.getElementById("seher_id_label").style.color = "#495057";
  document.getElementById("seher_id").style.color = "#495057";
  document.getElementById("seher_id").style.borderColor = "#ced4da";
  document.getElementById("seher_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
  document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
  var RayonTelebEt = new XMLHttpRequest();
  RayonTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("metrotelebi").innerHTML = " ";
      document.getElementById("metrotelebi").innerHTML = this.responseText;
    }

  };
  RayonTelebEt.open("GET", "anliq_yenileme/metrotelebi.php?seher_id=" + seher_id, true);
  RayonTelebEt.send();
}
/*===============================Metro tələb edir ====================*/


/*===============================Nişangah tələb edir ====================*/
function NisangahYoxlanis(seher_id) {
  var RayonTelebEt = new XMLHttpRequest();
  RayonTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("nisangahtelebi").innerHTML = " ";
      document.getElementById("nisangahtelebi").innerHTML = this.responseText;
    }

  };
  RayonTelebEt.open("GET", "anliq_yenileme/nisangahtelebi.php?seher_id=" + seher_id, true);
  RayonTelebEt.send();
}
/*===============================Nişangah tələb edir ====================*/



/*===============================Rayon  secildi ====================*/
function RayonSecildi() {
  document.getElementById("rayon_id_label").style.color = "#495057";
  document.getElementById("rayon_id").style.color = "#495057";
  document.getElementById("rayon_id").style.borderColor = "#ced4da";
  document.getElementById("rayon_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
  document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
}
/*===============================Rayon  secildi ====================*/

/*===============================Metro secildi ====================*/
function MetroSecildi() {
  document.getElementById("metro_id_label").style.color = "#495057";
  document.getElementById("metro_id").style.color = "#495057";
  document.getElementById("metro_id").style.borderColor = "#ced4da";
  document.getElementById("metro_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
  document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
}
/*===============================Metro secildi ====================*/


/*===============================Nisangah secildi ====================*/
function NisangahSecildi() {
  document.getElementById("nisangah_id_label").style.color = "#495057";
  document.getElementById("nisangah_id").style.color = "#495057";
  document.getElementById("nisangah_id").style.borderColor = "#ced4da";
  document.getElementById("nisangah_id").style.boxShadow = "1px 0px 1px 0px #ced4da";
  document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
}
/*===============================Nisangah secildi ====================*/




/*===============================Avtomobilin qiymet yazildi ====================*/
function SeherYazildi() {
  var AvtoYusrusKmKontrol = document.getElementById("seher_id");
  if (AvtoYusrusKmKontrol.value == "") {
    document.getElementById("seher_id_label").style.color = "#ff0000";
    document.getElementById("seher_id").style.color = "#ff0000";
    document.getElementById("seher_id").style.borderColor = "#ff0000";
    document.getElementById("seher_id").style.boxShadow = " 1px 0px 1px 0px #ff0000";
    document.getElementById("UnvanYoxlanis").removeAttribute("data-target");
    AvtoYusrusKmKontrol.focus();
    return;
  } else {
    document.getElementById("seher_id_label").style.color = "#495057";
    document.getElementById("seher_id").style.color = "#495057";
    document.getElementById("seher_id").style.borderColor = "#ced4da";
    document.getElementById("seher_id").style.boxShadow = " 0px 0px 0px 0px #ced4da";
    document.getElementById("UnvanYoxlanis").setAttribute("data-target", "#collapseFive");
  }
}
/*===============================Avtomobilin qiymet yazildi ====================*/





























/*===============================Avtomobilin markasına görə mödelini gətirmə başlayır=============*/
function SeherTelebEt(dovlet_id) {
  var SeheriniTelebEt = new XMLHttpRequest();
  SeheriniTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("seher_id").innerHTML = " ";
      document.getElementById("seher_id").innerHTML = this.responseText;
    }
  };
  SeheriniTelebEt.open("GET", "anliq_yenileme/seher.php?dovlet_id=" + dovlet_id, true);
  SeheriniTelebEt.send();
}
/*===============================Avtomobilin markasına görə mödelini gətirmə bitir====================*/


function elanduzenle() {
  elansahibyoxlaid = document.getElementById('elanduzenleidinput').value;
  var elankod = document.getElementById('elansahibiduzenlekod').value;
  var url = document.getElementById('url').value;
  var koduzunluq = elankod.length;
  if (koduzunluq == 6) {
    document.getElementById('elanduzenlemodali').style.display = 'none';
    document.getElementById('kodsefdirmetni').style.display = 'none';

    var elansahibyoxla = new XMLHttpRequest();
    console.log(elansahibyoxla);
    elansahibyoxla.open("POST", "netting/elanduzenleyoxla.php", true);
    elansahibyoxla.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    elansahibyoxla.send("elansahibyoxlaid=" + elansahibyoxlaid + "&elankod=" + elankod);
    elansahibyoxla.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var cavab = this.responseText;
        var cavablar = cavab.trim();
        if (cavablar == "var") {
          document.getElementById('elanduzenlemodali').style.display = 'none';
          document.getElementById('kodsefdirmetni').style.display = 'none';
          window.location.href = url;
        } else {
          document.getElementById('elanduzenlemodali').style.display = 'block';
          document.getElementById('kodsefdirmetni').style.display = 'block';
          return;
        }
      } else {
        document.getElementById('elanduzenlemodali').style.display = 'block';
        document.getElementById('kodsefdirmetni').style.display = 'block';
        return;
      }
    }

  } else {
    document.getElementById('elanduzenlemodali').style.display = 'block';
    document.getElementById('kodsefdirmetni').style.display = 'block';
    return;
  }

};

/*Elan növü seçildi*/
function elan_novu_secildi() {
  document.getElementById("elan_novu_secilmedi").style.display = "none";
  document.getElementById("elan_novu_label").style.color = "#2A3F54";
  document.getElementById("elan_novu").style.color = "#2A3F54";
  document.getElementById("elan_novu").style.borderColor = "#2A3F54";
  document.getElementById("elan_novu").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}




/*Elan növü seçildi*/
function avto_elan_novu_secildi(gelenid) {
  document.getElementById("elan_novu_secilmedi").style.display = "none";
  document.getElementById("elan_novu_label").style.color = "#2A3F54";
  document.getElementById("elan_novu").style.color = "#2A3F54";
  document.getElementById("elan_novu").style.borderColor = "#2A3F54";
  document.getElementById("elan_novu").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
  var RayonTelebEt = new XMLHttpRequest();
  RayonTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("krdeittelebi").innerHTML = " ";
      document.getElementById("krdeittelebi").innerHTML = this.responseText;
    }
  };
  RayonTelebEt.open("GET", "anliq_yenileme/kredit_telebi.php?gelenid=" + gelenid, true);
  RayonTelebEt.send();
}
/*Mənzillər elanları üçün şəhər seçildi*/

/*Elan növü seçildi*/




function MalNovuSecildi() {
  document.getElementById("malin_novusecilmedi").style.display = "none";
  document.getElementById("malin_novulabel").style.color = "#2A3F54";
  document.getElementById("malin_novu").style.color = "#2A3F54";
  document.getElementById("malin_novu").style.borderColor = "#2A3F54";
  document.getElementById("malin_novu").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}











function ProsessorSecildi() {
  document.getElementById("prosessor_secilmedi_id").style.display = "none";
  document.getElementById("prosessor_label").style.color = "#2A3F54";
  document.getElementById("prosessor").style.color = "#2A3F54";
  document.getElementById("prosessor").style.borderColor = "#2A3F54";
  document.getElementById("prosessor").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

















function MuherrikinGucuYazildi() {
  var AvtoYusrusKmKontrol = document.getElementById("muherrikin_at_gucu");
  if (AvtoYusrusKmKontrol.value == "") {
    document.getElementById("MuherrikinAtGucuYazilmadi").style.display =
    "block";
    document.getElementById("AutoMuherrikGucuLabel").style.color = "#ff0000";
    document.getElementById("muherrikin_at_gucu").style.color = "#ff0000";
    document.getElementById("muherrikin_at_gucu").style.borderColor = "#ff0000";
    document.getElementById("muherrikin_at_gucu").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("MuherrikinAtGucuYazilmadi").style.display = "none";
    document.getElementById("AutoMuherrikGucuLabel").style.color = "#2A3F54";
    document.getElementById("muherrikin_at_gucu").style.color = "#2A3F54";
    document.getElementById("muherrikin_at_gucu").style.borderColor = "#2A3F54";
    document.getElementById("muherrikin_at_gucu").style.boxShadow =
    " 0px 0px 0px 0px #2A3F54";
  }
}









/*

function SeherSecildi() {
  document.getElementById("SeherSecilmedi").style.display = "none";
  document.getElementById("SeherLabel").style.color = "#2A3F54";
  document.getElementById("seher_id").style.color = "#2A3F54";
  document.getElementById("seher_id").style.borderColor = "#2A3F54";
  document.getElementById("seher_id").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}
*/
function PulNovuSecildi() {
  x = document.getElementsByClassName("puladi");
  x[0].style.color = "#2A3F54";
  x[1].style.color = "#2A3F54";
  x[2].style.color = "#2A3F54";
  document.getElementById("PulNovuSecilmedi").style.display = "none";
}

function MezmunYazildi() {
  var MezmunKontrol = document.getElementById("mezmun");
  if (MezmunKontrol.value == "") {
    document.getElementById("elavemelumatyazilmadi").style.display = "block";
    document.getElementById("MezmumLabel").style.color = "#ff0000";
    document.getElementById("mezmun").style.color = "#ff0000";
    document.getElementById("mezmun").style.borderColor = "#ff0000";
    document.getElementById("mezmun").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("elavemelumatyazilmadi").style.display = "none";
    document.getElementById("MezmumLabel").style.color = "#2A3F54";
    document.getElementById("mezmun").style.color = "#2A3F54";
    document.getElementById("mezmun").style.borderColor = "#2A3F54";
    document.getElementById("mezmun").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
  }
}

function ElanAdiYazildi() {
  var ElanAdiKontrol = document.getElementById("elan_adi");
  if (ElanAdiKontrol.value == "") {
    document.getElementById("ElanAdiYazilmadi").style.display = "block";
    document.getElementById("elan_adilabel").style.color = "#ff0000";
    document.getElementById("elan_adi").style.color = "#ff0000";
    document.getElementById("elan_adi").style.borderColor = "#ff0000";
    document.getElementById("elan_adi").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("ElanAdiYazilmadi").style.display = "none";
    document.getElementById("elan_adilabel").style.color = "#2A3F54";
    document.getElementById("elan_adi").style.color = "#2A3F54";
    document.getElementById("elan_adi").style.borderColor = "#2A3F54";
    document.getElementById("elan_adi").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
  }
}





function AdYazildi() {
  var AdYazildiKontrol = document.getElementById("ad");
  var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("ad");
  if (AdYazildiKontrol.value == "") {
    document.getElementById("AdYazilmadi").style.display = "block";
    document.getElementById("AdIdLabel").style.color = "#ff0000";
    document.getElementById("ad").style.color = "#ff0000";
    var element = document.getElementById("ad");
    element.classList.add("pleysoldercolor");
    document.getElementById("ad").style.borderColor = "#ff0000";
    document.getElementById("ad").style.boxShadow = "1px 0px 1px 0px #ff0000";
    return;
  } else {
    var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("ad");
    document.getElementById("AdYazilmadi").style.display = "none";
    document.getElementById("AdIdLabel").style.color = "#2A3F54";
    document.getElementById("ad").style.color = "#2A3F54";
    var element = document.getElementById("ad");
    element.classList.remove("pleysoldercolor");
    document.getElementById("ad").style.borderColor = "#2A3F54";
    document.getElementById("ad").style.boxShadow = "0px 0px 0px 0px #2A3F54";
  }
}

function SoyAdYazildi() {
  var SoyAdYazildiKontrol = document.getElementById("soyad");
  var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("soyad");
  if (SoyAdYazildiKontrol.value == "") {
    document.getElementById("SoyAdYazilmadi").style.display = "block";
    document.getElementById("SoyadIdLabel").style.color = "#ff0000";
    document.getElementById("soyad").style.color = "#ff0000";
    var element = document.getElementById("soyad");
    element.classList.add("pleysoldercolor");
    document.getElementById("soyad").style.borderColor = "#ff0000";
    document.getElementById("soyad").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else {
    var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("soyad");
    document.getElementById("SoyAdYazilmadi").style.display = "none";
    document.getElementById("SoyadIdLabel").style.color = "#2A3F54";
    document.getElementById("soyad").style.color = "#2A3F54";
    var element = document.getElementById("soyad");
    element.classList.remove("pleysoldercolor");
    document.getElementById("soyad").style.borderColor = "#2A3F54";
    document.getElementById("soyad").style.boxShadow =
    "0px 0px 0px 0px #2A3F54";
  }
}

function TelefonYazildi() {
  var TelefonValue = document.getElementById("telefon_bir").value;
  var TelefonUzunluq = TelefonValue.length;

  if (TelefonUzunluq !== 10) {
    document.getElementById("TelefonYazilmadi").style.display = "block";
    document.getElementById("TelefonBirId").style.color = "#ff0000";
    document.getElementById("telefon_bir").style.color = "#ff0000";
    var element = document.getElementById("telefon_bir");
    element.classList.add("pleysoldercolor");
    document.getElementById("telefon_bir").style.borderColor = "#ff0000";
    document.getElementById("telefon_bir").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("TelefonYazilmadi").style.display = "none";
    document.getElementById("TelefonBirId").style.color = "#2A3F54";
    document.getElementById("telefon_bir").style.color = "#2A3F54";
    var element = document.getElementById("telefon_bir");
    element.classList.remove("pleysoldercolor");
    document.getElementById("telefon_bir").style.borderColor = "#2A3F54";
    document.getElementById("telefon_bir").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
  }
}





function EmailYazildi() {
  var EmailYazildiKontrol = document.getElementById("email");
  var EmailFormatiKontrol = EMailKontrolEt(EmailYazildiKontrol);
  if (EmailYazildiKontrol.value == "") {
    document.getElementById("EmailYazilmadi").style.display = "block";
    document.getElementById("EmailIdLabel").style.color = "#ff0000";
    document.getElementById("email").style.color = "#ff0000";
    var element = document.getElementById("email");
    element.classList.add("pleysoldercolor");
    document.getElementById("email").style.borderColor = "#ff0000";
    document.getElementById("email").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else if (EmailYazildiKontrol.value !== "") {
    var EmailFormati = document.getElementById("email").value;
    var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
    if (EmailFormatiKontrol == false) {
      document.getElementById("EmailYazilmadi").style.display = "none";
      document.getElementById("EmailDuzgunYazilmadi").style.display = "block";
      document.getElementById("EmailIdLabel").style.color = "#ff0000";
      document.getElementById("email").style.color = "#ff0000";
      var element = document.getElementById("email");
      element.classList.add("pleysoldercolor");
      document.getElementById("email").style.borderColor = "#ff0000";
      document.getElementById("email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      return;
    } else {
      document.getElementById("EmailYazilmadi").style.display = "none";
      document.getElementById("EmailDuzgunYazilmadi").style.display = "none";
      document.getElementById("EmailIdLabel").style.color = "#2A3F54";
      document.getElementById("email").style.color = "#2A3F54";
      var element = document.getElementById("email");
      element.classList.add("pleysoldercolor");
      document.getElementById("email").style.borderColor = "#2A3F54";
      document.getElementById("email").style.boxShadow =
      "0px 0px 0px 0px #2A3F54";
    }
  } else {
    document.getElementById("EmailYazilmadi").style.display = "none";
    document.getElementById("EmailIdLabel").style.color = "#2A3F54";
    document.getElementById("email").style.color = "#2A3F54";
    var element = document.getElementById("email");
    element.classList.remove("pleysoldercolor");
    document.getElementById("email").style.borderColor = "#2A3F54";
    document.getElementById("email").style.boxShadow =
    "0px 0px 0px 0px #2A3F54";
  }
}







function YasayisSahesiYazildi() {
  var YasayisSahesiYazildiKontrol = document.getElementById("yasayis_sahesi");
  if (YasayisSahesiYazildiKontrol.value == "") {
    document.getElementById("YasayisSahesiyazilmadi").style.display = "block";
    document.getElementById("YasayisSahesilabel").style.color = "#ff0000";
    var element = document.getElementById("yasayis_sahesi");
    element.classList.add("pleysoldercolor");
    document.getElementById("yasayis_sahesi").style.color = "#ff0000";
    document.getElementById("yasayis_sahesi").style.borderColor = "#ff0000";
    document.getElementById("yasayis_sahesi").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    YasayisSahesiYazildiKontrol.focus();
    return;
  } else {
    document.getElementById("YasayisSahesiyazilmadi").style.display = "none";
    document.getElementById("YasayisSahesilabel").style.color = "#2A3F54";
    var element = document.getElementById("yasayis_sahesi");
    element.classList.remove("pleysoldercolor");
    document.getElementById("yasayis_sahesi").style.color = "#2A3F54";
    document.getElementById("yasayis_sahesi").style.borderColor = "#2A3F54";
    document.getElementById("yasayis_sahesi").style.boxShadow =
    " 1px 0px 1px 0px #2A3F54";
  }
}

function BinaMertebesecildiKontrol() {
  document.getElementById("BinaMertebeSecilmedi").style.display = "none";
  document.getElementById("BinaMertebeLabelID").style.color = "#2A3F54";
  document.getElementById("binaninmertebesayi").style.color = "#2A3F54";
  document.getElementById("binaninmertebesayi").style.borderColor = "#2A3F54";
  document.getElementById("binaninmertebesayi").style.boxShadow =
  " 1px 0px 1px 0px #2A3F54";
}

function BlokSecildi() {
  document.getElementById("YerlesdiyiBlokSecilmedi").style.display = "none";
  document.getElementById("YerlesdiyiBlokLabel").style.color = "#2A3F54";
  document.getElementById("yerlesdiyiblok").style.color = "#2A3F54";
  document.getElementById("yerlesdiyiblok").style.borderColor = "#2A3F54";
  document.getElementById("yerlesdiyiblok").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

function YerlesdiyiMertebeSecildi() {
  document.getElementById("YerlesdiyiMertebeSecilmedi").style.display = "none";
  document.getElementById("YerlesdiyiMertebeLabel").style.color = "#2A3F54";
  document.getElementById("yerlesdiyi_mertebe").style.color = "#2A3F54";
  document.getElementById("yerlesdiyi_mertebe").style.borderColor = "#2A3F54";
  document.getElementById("yerlesdiyi_mertebe").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

function otaqsayisecildi() {
  document.getElementById("Otaqsayisecilmedi").style.display = "none";
  document.getElementById("otaksayilabel").style.color = "#2A3F54";
  document.getElementById("otaq_sayi").style.color = "#2A3F54";
  document.getElementById("otaq_sayi").style.borderColor = "#2A3F54";
  document.getElementById("otaq_sayi").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

function menzilveziyyetisecildi() {
  document.getElementById("menzilveziyyetisecilmedi").style.display = "none";
  document.getElementById("menzil_veziyyetilabel").style.color = "#2A3F54";
  document.getElementById("menzil_veziyyeti").style.color = "#2A3F54";
  document.getElementById("menzil_veziyyeti").style.borderColor = "#2A3F54";
  document.getElementById("menzil_veziyyeti").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

function ElanVerenSecildi() {
  document.getElementById("elanverensecilmedi").style.display = "none";
  document.getElementById("elan_verenlabel").style.color = "#2A3F54";
  document.getElementById("elan_veren").style.color = "#2A3F54";
  document.getElementById("elan_veren").style.borderColor = "#2A3F54";
  document.getElementById("elan_veren").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

function UnvanYazildi() {
  var YasayisSahesiYazildiKontrol = document.getElementById("unvan");
  if (YasayisSahesiYazildiKontrol.value == "") {
    document.getElementById("unvanyazilmadi").style.display = "block";
    document.getElementById("unvanlabel").style.color = "#ff0000";
    var element = document.getElementById("unvan");
    element.classList.add("pleysoldercolor");
    document.getElementById("unvan").style.color = "#ff0000";
    document.getElementById("unvan").style.borderColor = "#ff0000";
    document.getElementById("unvan").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    UnvanYazildiSecimKontrol.focus();
    return;
  } else {
    document.getElementById("unvanyazilmadi").style.display = "none";
    document.getElementById("unvanlabel").style.color = "#2A3F54";
    var element = document.getElementById("unvan");
    element.classList.remove("pleysoldercolor");
    document.getElementById("unvan").style.color = "#2A3F54";
    document.getElementById("unvan").style.borderColor = "#2A3F54";
    document.getElementById("unvan").style.boxShadow =
    " 1px 0px 1px 0px #2A3F54";
  }
}

function emlaknovusecildi() {
  document.getElementById("Emlaknovusecilmedi").style.display = "none";
  document.getElementById("emlakin_novulabel").style.color = "#2A3F54";
  document.getElementById("emlakin_novu").style.color = "#2A3F54";
  document.getElementById("emlakin_novu").style.borderColor = "#2A3F54";
  document.getElementById("emlakin_novu").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}

function ZirzemiSecildi() {
  x = document.getElementsByClassName("zirzemi");
  x[0].style.color = "#2A3F54";
  x[1].style.color = "#2A3F54";
  document.getElementById("zirzemisecilmedi").style.display = "none";
  document.getElementById("zirzemilabel").style.color = "#2A3F54";
}

function TorpaqSahesiyazildi() {
  var Torpaqsahesiyazildi = document.getElementById("torpaqsahesi");
  if (Torpaqsahesiyazildi.value == "") {
    document.getElementById("TorpaqSahesiYazilmadi").style.display = "block";
    document.getElementById("torpaqsahesilabel").style.color = "#ff0000";
    var element = document.getElementById("torpaqsahesi");
    element.classList.add("pleysoldercolor");
    document.getElementById("torpaqsahesi").style.color = "#ff0000";
    document.getElementById("torpaqsahesi").style.borderColor = "#ff0000";
    document.getElementById("torpaqsahesi").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";

    return;
  } else {
    document.getElementById("TorpaqSahesiYazilmadi").style.display = "none";
    document.getElementById("torpaqsahesilabel").style.color = "#2A3F54";
    var element = document.getElementById("torpaqsahesi");
    element.classList.remove("pleysoldercolor");
    document.getElementById("torpaqsahesi").style.color = "#2A3F54";
    document.getElementById("torpaqsahesi").style.borderColor = "#2A3F54";
    document.getElementById("torpaqsahesi").style.boxShadow =
    " 1px 0px 1px 0px #2A3F54";
  }
}

function ElanAdiYazildi() {
  var ElanAdiYazildikontrol = document.getElementById("elan_adi");
  if (ElanAdiYazildikontrol.value == "") {
    document.getElementById("ElanAdiYazilmadi").style.display = "block";
    document.getElementById("elan_adilabel").style.color = "#ff0000";
    var element = document.getElementById("elan_adi");
    element.classList.add("pleysoldercolor");
    document.getElementById("elan_adi").style.color = "#ff0000";
    document.getElementById("elan_adi").style.borderColor = "#ff0000";
    document.getElementById("elan_adi").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    ElanAdiYazildikontrol.focus();
    return;
  } else {
    document.getElementById("ElanAdiYazilmadi").style.display = "none";
    document.getElementById("elan_adilabel").style.color = "#2A3F54";
    var element = document.getElementById("elan_adi");
    element.classList.remove("pleysoldercolor");
    document.getElementById("elan_adi").style.color = "#2A3F54";
    document.getElementById("elan_adi").style.borderColor = "#2A3F54";
    document.getElementById("elan_adi").style.boxShadow =
    " 0px 0px 0px 0px #2A3F54";
  }
}
/* Əmlakın Vəziyyəti Secildi */
function Emlakin_Veziyyeti_Secildi() {
  document.getElementById("emlakin_veziyyeti_secilmedi").style.display = "none";
  document.getElementById("emlakin_veziyyetilabel").style.color = "#2A3F54";
  document.getElementById("emlakin_veziyyeti").style.color = "#2A3F54";
  document.getElementById("emlakin_veziyyeti").style.borderColor = "#2A3F54";
  document.getElementById("emlakin_veziyyeti").style.boxShadow =
  " 1px 0px 1px 0px #2A3F54";
}
/* /Əmlakın Vəziyyəti Secildi */
function SifreGonderEmailKontrol() {
  var EmailYazildiKontrol = document.getElementById("emailsifregonder");
  if (EmailYazildiKontrol.value == "") {
    document.getElementById("EmailYazilmadi").style.display = "block";
    document.getElementById("EmailBazadaYok").style.display = "none";
    document.getElementById("EmailIdLabel").style.color = "#ff0000";
    document.getElementById("emailsifregonder").style.color = "#ff0000";
    var element = document.getElementById("emailsifregonder");
    element.classList.add("pleysoldercolor");
    document.getElementById("emailsifregonder").style.borderColor = "#ff0000";
    document.getElementById("emailsifregonder").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else if (EmailYazildiKontrol.value !== "") {
    var EmailFormati = document.getElementById("emailsifregonder").value;
    var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
    if (EmailFormatiKontrol == false) {
      document.getElementById("EmailYazilmadi").style.display = "none";
      document.getElementById("EmailDuzgunYazilmadi").style.display = "block";
      document.getElementById("EmailBazadaYok").style.display = "none";
      document.getElementById("EmailIdLabelgonder").style.color = "#ff0000";
      document.getElementById("emailsifregonder").style.color = "#ff0000";
      var element = document.getElementById("emailsifregonder");
      element.classList.add("pleysoldercolor");
      document.getElementById("emailsifregonder").style.borderColor = "#ff0000";
      document.getElementById("emailsifregonder").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      return;
    } else {
      if (EmailYazildiKontrol.value !== "") {
        var EmailFormatis = document.getElementById("emailsifregonder").value;
        var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
        if (EmailFormatiKontrol == true) {
          document.getElementById("EmailYazilmadi").style.display = "none";
          document.getElementById("EmailDuzgunYazilmadi").style.display =
          "none";

          var EmailFormatigonder = new XMLHttpRequest();

          EmailFormatigonder.open("POST", "admins/netting/islem.php", true);
          EmailFormatigonder.setRequestHeader(
            "Content-type",
            "application/x-www-form-urlencoded"
            );
          EmailFormatigonder.send("EmailFormatis=" + EmailFormatis);
          EmailFormatigonder.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              var bazadavar = this.responseText;
              var bazadavarkontrol = bazadavar.trim();
              if (bazadavarkontrol == "var") {
                document.getElementById("EmailBazadaYok").style.display =
                "none";
                document.getElementById("EmailIdLabelgonder").style.color =
                "#2A3F54";
                document.getElementById("emailsifregonder").style.color =
                "#2A3F54";
                var element = document.getElementById("emailsifregonder");
                element.classList.remove("pleysoldercolor");
                document.getElementById("emailsifregonder").style.borderColor =
                "#2A3F54";
                document.getElementById("emailsifregonder").style.boxShadow =
                "1px 0px 1px 0px #2A3F54";
                document
                .getElementById("sifremigonderbuttonid")
                .removeAttribute("disabled");
                return;
              } else {
                document.getElementById("EmailBazadaYok").style.display =
                "block";
                document.getElementById("EmailIdLabelgonder").style.color =
                "#ff0000";
                document.getElementById("emailsifregonder").style.color =
                "#ff0000";
                var element = document.getElementById("emailsifregonder");
                element.classList.add("pleysoldercolor");
                document.getElementById("emailsifregonder").style.borderColor =
                "#ff0000";
                document.getElementById("emailsifregonder").style.boxShadow =
                "1px 0px 1px 0px #ff0000";
                return;
              }
            }
          };
        } else {
          document.getElementById("EmailYazilmadi").style.display = "none";
          document.getElementById("EmailDuzgunYazilmadi").style.display =
          "none";
          document.getElementById("EmailIdLabelgonder").style.color = "#2A3F54";
          document.getElementById("emailsifregonder").style.color = "#2A3F54";
          var element = document.getElementById("emailsifregonder");
          element.classList.add("pleysoldercolor");
          document.getElementById("emailsifregonder").style.borderColor =
          "#2A3F54";
          document.getElementById("emailsifregonder").style.boxShadow =
          "0px 0px 0px 0px #2A3F54";
        }
      }
    }
  } else {
    document.getElementById("EmailYazilmadi").style.display = "none";
    document.getElementById("EmailIdLabelgonder").style.color = "#2A3F54";
    document.getElementById("emailsifregonder").style.color = "#2A3F54";
    var element = document.getElementById("emailsifregonder");
    element.classList.remove("pleysoldercolor");
    document.getElementById("emailsifregonder").style.borderColor = "#2A3F54";
    document.getElementById("emailsifregonder").style.boxShadow =
    "0px 0px 0px 0px #2A3F54";
  }
}

function UserAdYazildi() {
  var UserAdYazildiKontrol = document.getElementById("User_Ad");
  if (UserAdYazildiKontrol.value == "") {
    document.getElementById("UserAdYazilmadi").style.display = "block";
    document.getElementById("UserAdFormatSef").style.display = "none";
    document.getElementById("User_AdLabel").style.color = "#ff0000";
    document.getElementById("User_Ad").style.color = "#ff0000";
    document.getElementById("User_Ad").style.borderColor = "#ff0000";
    document.getElementById("User_Ad").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    return;
  } else if (UserAdYazildiKontrol.value !== "") {
    var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("User_Ad");
    if (UserAdFormatKontrol == false) {
      document.getElementById("UserAdYazilmadi").style.display = "none";
      document.getElementById("UserAdFormatSef").style.display = "block";
      document.getElementById("User_AdLabel").style.color = "#2A3F54";
      document.getElementById("User_Ad").style.color = "#2A3F54";
      document.getElementById("User_Ad").style.borderColor = "#2A3F54";
      document.getElementById("User_Ad").style.boxShadow =
      " 0px 0px 0px 0px #2A3F54";
    } else {
      document.getElementById("UserAdYazilmadi").style.display = "none";
      document.getElementById("UserAdFormatSef").style.display = "none";
      var element = document.getElementById("User_Soyad");
      element.classList.remove("pleysoldercolor");
      document.getElementById("User_AdLabel").style.color = "#2A3F54";
      document.getElementById("User_Ad").style.color = "#2A3F54";
      document.getElementById("User_Ad").style.borderColor = "#2A3F54";
      document.getElementById("User_Ad").style.boxShadow =
      " 0px 0px 0px 0px #2A3F54";
    }
  } else {
    document.getElementById("UserAdYazilmadi").style.display = "none";
    document.getElementById("UserAdFormatSef").style.display = "none";
    var element = document.getElementById("User_Soyad");
    element.classList.remove("pleysoldercolor");
    document.getElementById("User_AdLabel").style.color = "#2A3F54";
    document.getElementById("User_Ad").style.color = "#2A3F54";
    document.getElementById("User_Ad").style.borderColor = "#2A3F54";
    document.getElementById("User_Ad").style.boxShadow =
    " 0px 0px 0px 0px #2A3F54";
  }
}

function UserSoyAdYazildi() {
  var UserAdYazildiKontrol = document.getElementById("User_Soyad");
  if (UserAdYazildiKontrol.value == "") {
    document.getElementById("UserSoyAdYazilmadi").style.display = "block";
    document.getElementById("UserSoyAdFormatSef").style.display = "none";
    var element = document.getElementById("User_Soyad");
    element.classList.add("pleysoldercolor");
    document.getElementById("User_SoyadLabel").style.color = "#ff0000";
    document.getElementById("User_Soyad").style.color = "#ff0000";
    document.getElementById("User_Soyad").style.borderColor = "#ff0000";
    document.getElementById("User_Soyad").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    return;
  } else if (UserAdYazildiKontrol.value !== "") {

    var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("User_Soyad");
    if (UserAdFormatKontrol == false) {
      document.getElementById("UserSoyAdYazilmadi").style.display = "none";
      document.getElementById("UserSoyAdFormatSef").style.display = "block";
      document.getElementById("User_SoyadLabel").style.color = "#2A3F54";
      document.getElementById("User_Soyad").style.color = "#2A3F54";
      document.getElementById("User_Soyad").style.borderColor = "#2A3F54";
      document.getElementById("User_Soyad").style.boxShadow =
      " 0px 0px 0px 0px #2A3F54";
    } else {
      document.getElementById("UserSoyAdYazilmadi").style.display = "none";
      document.getElementById("UserSoyAdFormatSef").style.display = "none";
      var element = document.getElementById("User_Soyad");
      element.classList.remove("pleysoldercolor");
      document.getElementById("User_SoyadLabel").style.color = "#2A3F54";
      document.getElementById("User_Soyad").style.color = "#2A3F54";
      document.getElementById("User_Soyad").style.borderColor = "#2A3F54";
      document.getElementById("User_Soyad").style.boxShadow =
      " 0px 0px 0px 0px #2A3F54";
    }
  } else {
    document.getElementById("UserSoyAdYazilmadi").style.display = "none";
    document.getElementById("UserSoyAdFormatSef").style.display = "none";
    var element = document.getElementById("User_Soyad");
    element.classList.remove("pleysoldercolor");
    document.getElementById("User_SoyadLabel").style.color = "#2A3F54";
    document.getElementById("User_Soyad").style.color = "#2A3F54";
    document.getElementById("User_Soyad").style.borderColor = "#2A3F54";
    document.getElementById("User_Soyad").style.boxShadow =
    " 0px 0px 0px 0px #2A3F54";
  }
}

function cinssecildi() {
  x = document.getElementsByClassName("kisiqadinklass");
  x[0].style.color = "#2A3F54";
  x[1].style.color = "#2A3F54";
  document.getElementById("kisiqadinsecilmedi").style.display = "none";
  document.getElementById("kisiqadinlabelid").style.color = "#2A3F54";
}

function QeydiyyatTelefonYazildi() {
  var TelefonValue = document.getElementById("User_TelefonBir").value;
  var emailkontrol = document.getElementById("User_Email").value;
  var TelefonUzunluq = TelefonValue.length;

  var TelefonFiltirle = TelefonAlanlariniFiltirle("User_TelefonBir");
  if (TelefonUzunluq == 10) {
    var QeydiyyatTelefongonder = new XMLHttpRequest();
    QeydiyyatTelefongonder.open("POST", "admins/netting/islem.php", true);
    QeydiyyatTelefongonder.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
      );
    QeydiyyatTelefongonder.send(
      "TelefonVarKontrol=" + TelefonValue + "&emailkontrol=" + emailkontrol
      );
    QeydiyyatTelefongonder.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var cavab = this.responseText;
        var cavablar = cavab.split(" ");
        var telefonvar = cavablar[0].trim();
        var emailvar = cavablar[1].trim();
        if (telefonvar == "telefonvar") {
          document.getElementById("TelefonYazilmadi").style.display = "none";
          document.getElementById("TelefonBazadavar").style.display = "block";
          document.getElementById("User_TelefonBirLabel").style.color =
          "#ff0000";
          document.getElementById("User_TelefonBir").style.color = "#ff0000";
          var element = document.getElementById("User_TelefonBir");
          element.classList.add("pleysoldercolor");
          document.getElementById("User_TelefonBir").style.borderColor =
          "#ff0000";
          document.getElementById("User_TelefonBir").style.boxShadow =
          "1px 0px 1px 0px #ff0000";
          document
          .getElementById("Qeydiyyatbutton")
          .setAttribute("disabled", "disabled");
          return;
        } else {
          document.getElementById("TelefonYazilmadi").style.display = "none";
          document.getElementById("TelefonBazadavar").style.display = "none";
          document.getElementById("User_TelefonBirLabel").style.color =
          "#2A3F54";
          document.getElementById("User_TelefonBir").style.color = "#2A3F54";
          var element = document.getElementById("User_TelefonBir");
          element.classList.add("pleysoldercolor");
          document.getElementById("User_TelefonBir").style.borderColor =
          "#2A3F54";
          document.getElementById("User_TelefonBir").style.boxShadow =
          "1px 0px 1px 0px #2A3F54";
          if (emailvar == "emailvar") {
            document
            .getElementById("Qeydiyyatbutton")
            .setAttribute("disabled", "disabled");
            return;
          } else {
            document
            .getElementById("Qeydiyyatbutton")
            .removeAttribute("disabled", "disabled");
            return;
          }
        }
      } else {
        document.getElementById("TelefonYazilmadi").style.display = "block";
        document.getElementById("TelefonBazadavar").style.display = "none";
        document.getElementById("User_TelefonBirLabel").style.color = "#ff0000";
        document.getElementById("User_TelefonBir").style.color = "#ff0000";
        var element = document.getElementById("User_TelefonBir");
        element.classList.add("pleysoldercolor");
        document.getElementById("User_TelefonBir").style.borderColor =
        "#ff0000";
        document.getElementById("User_TelefonBir").style.boxShadow =
        "1px 0px 1px 0px #ff0000";
        document
        .getElementById("Qeydiyyatbutton")
        .setAttribute("disabled", "disabled");
        return;
      }
    };
  } else {
    document.getElementById("TelefonYazilmadi").style.display = "block";
    document.getElementById("TelefonBazadavar").style.display = "none";
    document.getElementById("User_TelefonBirLabel").style.color = "#ff0000";
    document.getElementById("User_TelefonBir").style.color = "#ff0000";
    var element = document.getElementById("User_TelefonBir");
    element.classList.add("pleysoldercolor");
    document.getElementById("User_TelefonBir").style.borderColor = "#ff0000";
    document.getElementById("User_TelefonBir").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document
    .getElementById("Qeydiyyatbutton")
    .setAttribute("disabled", "disabled");
    return;
  }
}

function QeydiyyatEmailKontrol() {
  var TelefonValue = document.getElementById("User_TelefonBir").value;
  var UserQeydiyyatEmailKontrol = document.getElementById("User_Email");
  if (UserQeydiyyatEmailKontrol.value == "") {
    document.getElementById("User_EmailYazilmadi").style.display = "block";
    document.getElementById("User_EmailDuzgunYazilmadi").style.display = "none";
    document.getElementById("EmailBazadaVar").style.display = "none";
    document.getElementById("User_EmailLabel").style.color = "#ff0000";
    document.getElementById("User_Email").style.color = "#ff0000";
    var element = document.getElementById("User_Email");
    element.classList.add("pleysoldercolor");
    document.getElementById("User_Email").style.borderColor = "#ff0000";
    document.getElementById("User_Email").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document
    .getElementById("Qeydiyyatbutton")
    .setAttribute("disabled", "disabled");
    return;
  } else if (UserQeydiyyatEmailKontrol.value !== "") {
    var UserQeydiyyatEmailKontrols = document.getElementById("User_Email")
    .value;
    var EmailFormatiKontrol = EMailKontrolEt(UserQeydiyyatEmailKontrols);
    if (EmailFormatiKontrol == true) {
      var EmailFormatigonder = new XMLHttpRequest();
      EmailFormatigonder.open("POST", "admins/netting/islem.php", true);
      EmailFormatigonder.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
        );
      EmailFormatigonder.send(
        "EmailFormati=" +
        UserQeydiyyatEmailKontrols +
        "&TelefonValue=" +
        TelefonValue
        );
      EmailFormatigonder.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var cavab = this.responseText;
          var cavablar = cavab.split(" ");
          var telefonvar = cavablar[0].trim();
          var emailvar = cavablar[1].trim();
          if (emailvar == "emailvar") {
            document.getElementById("User_EmailYazilmadi").style.display =
            "none";
            document.getElementById("User_EmailDuzgunYazilmadi").style.display =
            "none";
            document.getElementById("EmailBazadaVar").style.display = "block";
            document.getElementById("User_EmailLabel").style.color = "#ff0000";
            document.getElementById("User_Email").style.color = "#ff0000";
            var element = document.getElementById("User_Email");
            element.classList.add("pleysoldercolor");
            document.getElementById("User_Email").style.borderColor = "#ff0000";
            document.getElementById("User_Email").style.boxShadow =
            "1px 0px 1px 0px #ff0000";
            document
            .getElementById("Qeydiyyatbutton")
            .setAttribute("disabled", "disabled");
            return;
          } else {
            document.getElementById("User_EmailYazilmadi").style.display =
            "none";
            document.getElementById("User_EmailDuzgunYazilmadi").style.display =
            "none";
            document.getElementById("EmailBazadaVar").style.display = "none";
            document.getElementById("User_EmailLabel").style.color = "#2A3F54";
            document.getElementById("User_Email").style.color = "#2A3F54";
            var element = document.getElementById("User_Email");
            element.classList.remove("pleysoldercolor");
            document.getElementById("User_Email").style.borderColor = "#2A3F54";
            document.getElementById("User_Email").style.boxShadow =
            "1px 0px 1px 0px #2A3F54";
            if (telefonvar == "telefonvar") {
              document
              .getElementById("Qeydiyyatbutton")
              .setAttribute("disabled", "disabled");
              return;
            } else {
              document
              .getElementById("Qeydiyyatbutton")
              .removeAttribute("disabled", "disabled");
              return;
            }
            return;
          }
        } else {
          document.getElementById("User_EmailYazilmadi").style.display = "none";
          document.getElementById("User_EmailDuzgunYazilmadi").style.display =
          "none";
          document.getElementById("EmailBazadaVar").style.display = "block";
          document.getElementById("User_EmailLabel").style.color = "#ff0000";
          document.getElementById("User_Email").style.color = "#ff0000";
          var element = document.getElementById("User_Email");
          element.classList.add("pleysoldercolor");
          document.getElementById("User_Email").style.borderColor = "#ff0000";
          document.getElementById("User_Email").style.boxShadow =
          "1px 0px 1px 0px #ff0000";
          document
          .getElementById("Qeydiyyatbutton")
          .setAttribute("disabled", "disabled");
          return;
        }
      };
    } else {
      document.getElementById("User_EmailYazilmadi").style.display = "none";
      document.getElementById("User_EmailDuzgunYazilmadi").style.display =
      "block";
      document.getElementById("EmailBazadaVar").style.display = "none";
      document.getElementById("User_EmailLabel").style.color = "#ff0000";
      document.getElementById("User_Email").style.color = "#ff0000";
      var element = document.getElementById("User_Email");
      element.classList.remove("pleysoldercolor");
      document.getElementById("User_Email").style.borderColor = "#ff0000";
      document.getElementById("User_Email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      document
      .getElementById("Qeydiyyatbutton")
      .setAttribute("disabled", "disabled");
      return;
    }
  } else {
    document.getElementById("User_EmailYazilmadi").style.display = "block";
    document.getElementById("User_EmailDuzgunYazilmadi").style.display = "none";
    document.getElementById("EmailBazadaVar").style.display = "none";
    document.getElementById("User_EmailLabel").style.color = "#ff0000";
    document.getElementById("User_Email").style.color = "#ff0000";
    var element = document.getElementById("User_Email");
    element.classList.remove("pleysoldercolor");
    document.getElementById("User_Email").style.borderColor = "#ff0000";
    document.getElementById("User_Email").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document
    .getElementById("Qeydiyyatbutton")
    .setAttribute("disabled", "disabled");
    return;
  }
}



function sifrebirkontrol() {
  document.getElementById("sifre_biryazilmadi").style.display = "none";
  document.getElementById("sifre_ikieynideyil").style.display = "none";
  var SifreIkiKontrol = document.getElementById("sifre_iki").value;
  var SifreBirKontrol = document.getElementById("sifre_bir").value;
  if (SifreIkiKontrol !== SifreBirKontrol) {
    document.getElementById("sifre_ikieynideyil").style.display = "block";
    document.getElementById("sifre_bireynideyil").style.display = "block";
    document.getElementById("sifre_ikilabel").style.color = "#ff0000";
    document.getElementById("sifre_iki").style.color = "#ff0000";
    var element = document.getElementById("sifre_iki");
    element.classList.add("pleysoldercolor");
    document.getElementById("sifre_iki").style.borderColor = "#ff0000";
    document.getElementById("sifre_iki").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document.getElementById("sifre_birlabel").style.color = "#ff0000";
    document.getElementById("sifre_bir").style.color = "#ff0000";
    var element = document.getElementById("sifre_bir");
    element.classList.add("pleysoldercolor");
    document.getElementById("sifre_bir").style.borderColor = "#ff0000";
    document.getElementById("sifre_bir").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document
    .getElementById("Qeydiyyatbutton")
    .setAttribute("disabled", "disabled");
    return;
  } else {
    document.getElementById("sifre_ikieynideyil").style.display = "none";
    document.getElementById("sifre_bireynideyil").style.display = "none";
    document.getElementById("sifre_ikilabel").style.color = "#2A3F54";
    document.getElementById("sifre_iki").style.color = "#2A3F54";
    var element = document.getElementById("sifre_iki");
    element.classList.remove("pleysoldercolor");
    document.getElementById("sifre_iki").style.borderColor = "#2A3F54";
    document.getElementById("sifre_iki").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
    document.getElementById("sifre_birlabel").style.color = "#2A3F54";
    document.getElementById("sifre_bir").style.color = "#2A3F54";
    var element = document.getElementById("sifre_bir");
    element.classList.remove("pleysoldercolor");
    document.getElementById("sifre_bir").style.borderColor = "#2A3F54";
    document.getElementById("sifre_bir").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";

    var TelefonValue = document.getElementById("User_TelefonBir").value;
    var UserQeydiyyatEmailKontrol = document.getElementById("User_Email");
    if (UserQeydiyyatEmailKontrol.value == "") {
      document.getElementById("User_EmailYazilmadi").style.display = "block";
      document.getElementById("User_EmailDuzgunYazilmadi").style.display =
      "none";
      document.getElementById("EmailBazadaVar").style.display = "none";
      document.getElementById("User_EmailLabel").style.color = "#ff0000";
      document.getElementById("User_Email").style.color = "#ff0000";
      var element = document.getElementById("User_Email");
      element.classList.add("pleysoldercolor");
      document.getElementById("User_Email").style.borderColor = "#ff0000";
      document.getElementById("User_Email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      document
      .getElementById("Qeydiyyatbutton")
      .setAttribute("disabled", "disabled");
      return;
    } else if (UserQeydiyyatEmailKontrol.value !== "") {
      var UserQeydiyyatEmailKontrols = document.getElementById("User_Email")
      .value;
      var EmailFormatiKontrol = EMailKontrolEt(UserQeydiyyatEmailKontrols);
      if (EmailFormatiKontrol == true) {
        var EmailFormatigonder = new XMLHttpRequest();
        EmailFormatigonder.open("POST", "admins/netting/islem.php", true);
        EmailFormatigonder.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
          );
        EmailFormatigonder.send(
          "EmailFormati=" +
          UserQeydiyyatEmailKontrols +
          "&TelefonValue=" +
          TelefonValue
          );
        EmailFormatigonder.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            var cavab = this.responseText;
            var cavablar = cavab.split(" ");
            var telefonvar = cavablar[0].trim();
            var emailvar = cavablar[1].trim();
            if (emailvar == "emailvar") {
              document.getElementById("User_EmailYazilmadi").style.display =
              "none";
              document.getElementById(
                "User_EmailDuzgunYazilmadi"
                ).style.display = "none";
              document.getElementById("EmailBazadaVar").style.display = "block";
              document.getElementById("User_EmailLabel").style.color =
              "#ff0000";
              document.getElementById("User_Email").style.color = "#ff0000";
              var element = document.getElementById("User_Email");
              element.classList.add("pleysoldercolor");
              document.getElementById("User_Email").style.borderColor =
              "#ff0000";
              document.getElementById("User_Email").style.boxShadow =
              "1px 0px 1px 0px #ff0000";
              document
              .getElementById("Qeydiyyatbutton")
              .setAttribute("disabled", "disabled");
              return;
            } else {
              document.getElementById("User_EmailYazilmadi").style.display =
              "none";
              document.getElementById(
                "User_EmailDuzgunYazilmadi"
                ).style.display = "none";
              document.getElementById("EmailBazadaVar").style.display = "none";
              document.getElementById("User_EmailLabel").style.color =
              "#2A3F54";
              document.getElementById("User_Email").style.color = "#2A3F54";
              var element = document.getElementById("User_Email");
              element.classList.remove("pleysoldercolor");
              document.getElementById("User_Email").style.borderColor =
              "#2A3F54";
              document.getElementById("User_Email").style.boxShadow =
              "1px 0px 1px 0px #2A3F54";
              if (telefonvar == "telefonvar") {
                document
                .getElementById("Qeydiyyatbutton")
                .setAttribute("disabled", "disabled");
                return;
              } else {
                document
                .getElementById("Qeydiyyatbutton")
                .removeAttribute("disabled", "disabled");
                return;
              }
              return;
            }
          } else {
            document.getElementById("User_EmailYazilmadi").style.display =
            "none";
            document.getElementById("User_EmailDuzgunYazilmadi").style.display =
            "none";
            document.getElementById("EmailBazadaVar").style.display = "block";
            document.getElementById("User_EmailLabel").style.color = "#ff0000";
            document.getElementById("User_Email").style.color = "#ff0000";
            var element = document.getElementById("User_Email");
            element.classList.add("pleysoldercolor");
            document.getElementById("User_Email").style.borderColor = "#ff0000";
            document.getElementById("User_Email").style.boxShadow =
            "1px 0px 1px 0px #ff0000";
            document
            .getElementById("Qeydiyyatbutton")
            .setAttribute("disabled", "disabled");
            return;
          }
        };
      } else {
        document.getElementById("User_EmailYazilmadi").style.display = "none";
        document.getElementById("User_EmailDuzgunYazilmadi").style.display =
        "block";
        document.getElementById("EmailBazadaVar").style.display = "none";
        document.getElementById("User_EmailLabel").style.color = "#ff0000";
        document.getElementById("User_Email").style.color = "#ff0000";
        var element = document.getElementById("User_Email");
        element.classList.remove("pleysoldercolor");
        document.getElementById("User_Email").style.borderColor = "#ff0000";
        document.getElementById("User_Email").style.boxShadow =
        "1px 0px 1px 0px #ff0000";
        document
        .getElementById("Qeydiyyatbutton")
        .setAttribute("disabled", "disabled");
        return;
      }
    } else {
      document.getElementById("User_EmailYazilmadi").style.display = "block";
      document.getElementById("User_EmailDuzgunYazilmadi").style.display =
      "none";
      document.getElementById("EmailBazadaVar").style.display = "none";
      document.getElementById("User_EmailLabel").style.color = "#ff0000";
      document.getElementById("User_Email").style.color = "#ff0000";
      var element = document.getElementById("User_Email");
      element.classList.remove("pleysoldercolor");
      document.getElementById("User_Email").style.borderColor = "#ff0000";
      document.getElementById("User_Email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      document
      .getElementById("Qeydiyyatbutton")
      .setAttribute("disabled", "disabled");
      return;
    }
  }
}

function sifreikikontrol() {
  document.getElementById("sifreikiyazilmadi").style.display = "none";
  document.getElementById("sifre_ikieynideyil").style.display = "none";
  var SifreIkiKontrol = document.getElementById("sifre_iki").value;
  var SifreBirKontrol = document.getElementById("sifre_bir").value;
  if (SifreIkiKontrol !== SifreBirKontrol) {
    document.getElementById("sifre_ikieynideyil").style.display = "block";
    document.getElementById("sifre_bireynideyil").style.display = "block";
    document.getElementById("sifre_ikilabel").style.color = "#ff0000";
    document.getElementById("sifre_iki").style.color = "#ff0000";
    var element = document.getElementById("sifre_iki");
    element.classList.add("pleysoldercolor");
    document.getElementById("sifre_iki").style.borderColor = "#ff0000";
    document.getElementById("sifre_iki").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document.getElementById("sifre_birlabel").style.color = "#ff0000";
    document.getElementById("sifre_bir").style.color = "#ff0000";
    var element = document.getElementById("sifre_bir");
    element.classList.add("pleysoldercolor");
    document.getElementById("sifre_bir").style.borderColor = "#ff0000";
    document.getElementById("sifre_bir").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    document
    .getElementById("Qeydiyyatbutton")
    .setAttribute("disabled", "disabled");
    return;
  } else {
    document.getElementById("sifre_ikieynideyil").style.display = "none";
    document.getElementById("sifre_bireynideyil").style.display = "none";
    document.getElementById("sifre_ikilabel").style.color = "#2A3F54";
    document.getElementById("sifre_iki").style.color = "#2A3F54";
    var element = document.getElementById("sifre_iki");
    element.classList.remove("pleysoldercolor");
    document.getElementById("sifre_iki").style.borderColor = "#2A3F54";
    document.getElementById("sifre_iki").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
    document.getElementById("sifre_birlabel").style.color = "#2A3F54";
    document.getElementById("sifre_bir").style.color = "#2A3F54";
    var element = document.getElementById("sifre_bir");
    element.classList.remove("pleysoldercolor");
    document.getElementById("sifre_bir").style.borderColor = "#2A3F54";
    document.getElementById("sifre_bir").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";

    var TelefonValue = document.getElementById("User_TelefonBir").value;
    var UserQeydiyyatEmailKontrol = document.getElementById("User_Email");
    if (UserQeydiyyatEmailKontrol.value == "") {
      document.getElementById("User_EmailYazilmadi").style.display = "block";
      document.getElementById("User_EmailDuzgunYazilmadi").style.display =
      "none";
      document.getElementById("EmailBazadaVar").style.display = "none";
      document.getElementById("User_EmailLabel").style.color = "#ff0000";
      document.getElementById("User_Email").style.color = "#ff0000";
      var element = document.getElementById("User_Email");
      element.classList.add("pleysoldercolor");
      document.getElementById("User_Email").style.borderColor = "#ff0000";
      document.getElementById("User_Email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      document
      .getElementById("Qeydiyyatbutton")
      .setAttribute("disabled", "disabled");
      return;
    } else if (UserQeydiyyatEmailKontrol.value !== "") {
      var UserQeydiyyatEmailKontrols = document.getElementById("User_Email")
      .value;
      var EmailFormatiKontrol = EMailKontrolEt(UserQeydiyyatEmailKontrols);
      if (EmailFormatiKontrol == true) {
        var EmailFormatigonder = new XMLHttpRequest();
        EmailFormatigonder.open("POST", "admins/netting/islem.php", true);
        EmailFormatigonder.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
          );
        EmailFormatigonder.send(
          "EmailFormati=" +
          UserQeydiyyatEmailKontrols +
          "&TelefonValue=" +
          TelefonValue
          );
        EmailFormatigonder.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            var cavab = this.responseText;
            var cavablar = cavab.split(" ");
            var telefonvar = cavablar[0].trim();
            var emailvar = cavablar[1].trim();
            if (emailvar == "emailvar") {
              document.getElementById("User_EmailYazilmadi").style.display =
              "none";
              document.getElementById(
                "User_EmailDuzgunYazilmadi"
                ).style.display = "none";
              document.getElementById("EmailBazadaVar").style.display = "block";
              document.getElementById("User_EmailLabel").style.color =
              "#ff0000";
              document.getElementById("User_Email").style.color = "#ff0000";
              var element = document.getElementById("User_Email");
              element.classList.add("pleysoldercolor");
              document.getElementById("User_Email").style.borderColor =
              "#ff0000";
              document.getElementById("User_Email").style.boxShadow =
              "1px 0px 1px 0px #ff0000";
              document
              .getElementById("Qeydiyyatbutton")
              .setAttribute("disabled", "disabled");
              return;
            } else {
              document.getElementById("User_EmailYazilmadi").style.display =
              "none";
              document.getElementById(
                "User_EmailDuzgunYazilmadi"
                ).style.display = "none";
              document.getElementById("EmailBazadaVar").style.display = "none";
              document.getElementById("User_EmailLabel").style.color =
              "#2A3F54";
              document.getElementById("User_Email").style.color = "#2A3F54";
              var element = document.getElementById("User_Email");
              element.classList.remove("pleysoldercolor");
              document.getElementById("User_Email").style.borderColor =
              "#2A3F54";
              document.getElementById("User_Email").style.boxShadow =
              "1px 0px 1px 0px #2A3F54";
              if (telefonvar == "telefonvar") {
                document
                .getElementById("Qeydiyyatbutton")
                .setAttribute("disabled", "disabled");
                return;
              } else {
                document
                .getElementById("Qeydiyyatbutton")
                .removeAttribute("disabled", "disabled");
                return;
              }
              return;
            }
          } else {
            document.getElementById("User_EmailYazilmadi").style.display =
            "none";
            document.getElementById("User_EmailDuzgunYazilmadi").style.display =
            "none";
            document.getElementById("EmailBazadaVar").style.display = "block";
            document.getElementById("User_EmailLabel").style.color = "#ff0000";
            document.getElementById("User_Email").style.color = "#ff0000";
            var element = document.getElementById("User_Email");
            element.classList.add("pleysoldercolor");
            document.getElementById("User_Email").style.borderColor = "#ff0000";
            document.getElementById("User_Email").style.boxShadow =
            "1px 0px 1px 0px #ff0000";
            document
            .getElementById("Qeydiyyatbutton")
            .setAttribute("disabled", "disabled");
            return;
          }
        };
      } else {
        document.getElementById("User_EmailYazilmadi").style.display = "none";
        document.getElementById("User_EmailDuzgunYazilmadi").style.display =
        "block";
        document.getElementById("EmailBazadaVar").style.display = "none";
        document.getElementById("User_EmailLabel").style.color = "#ff0000";
        document.getElementById("User_Email").style.color = "#ff0000";
        var element = document.getElementById("User_Email");
        element.classList.remove("pleysoldercolor");
        document.getElementById("User_Email").style.borderColor = "#ff0000";
        document.getElementById("User_Email").style.boxShadow =
        "1px 0px 1px 0px #ff0000";
        document
        .getElementById("Qeydiyyatbutton")
        .setAttribute("disabled", "disabled");
        return;
      }
    } else {
      document.getElementById("User_EmailYazilmadi").style.display = "block";
      document.getElementById("User_EmailDuzgunYazilmadi").style.display =
      "none";
      document.getElementById("EmailBazadaVar").style.display = "none";
      document.getElementById("User_EmailLabel").style.color = "#ff0000";
      document.getElementById("User_Email").style.color = "#ff0000";
      var element = document.getElementById("User_Email");
      element.classList.remove("pleysoldercolor");
      document.getElementById("User_Email").style.borderColor = "#ff0000";
      document.getElementById("User_Email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      document
      .getElementById("Qeydiyyatbutton")
      .setAttribute("disabled", "disabled");
      return;
    }
  }
}

function emailssstesdik() {
  if (document.getElementById("User_Email_Tesdiq_Kod")) {
    var EmailTesdiqKod = document.getElementById("User_Email_Tesdiq_Kod");
    var User_Email_Tesdiq_Kod = EmailTesdiqKod.value;
    var User_ID = document.getElementById("User_ID").value;
    if (EmailTesdiqKod.value !== "") {
      document.getElementById("koduyaz").style.display = "none";
      var EmailTesdiqKodyoxla = new XMLHttpRequest();
      EmailTesdiqKodyoxla.open("POST", "admins/netting/islem.php", true);
      EmailTesdiqKodyoxla.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
        );
      EmailTesdiqKodyoxla.send(
        "User_Email_Tesdiq_Kods=" +
        User_Email_Tesdiq_Kod +
        "&User_ID=" +
        User_ID
        );
      EmailTesdiqKodyoxla.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var cavab = this.responseText;
          var kodvar = cavab.trim();
          if (kodvar == "var") {
            document.getElementById("koduyaz").style.display = "none";
            document
            .getElementById("emailtesdiklebutton")
            .removeAttribute("disabled", "disabled");
            EmailTesdiqKod.focus();
            return;
          } else {
            document.getElementById("koduyaz").style.display = "block";
            document
            .getElementById("emailtesdiklebutton")
            .setAttribute("disabled", "disabled");
            EmailTesdiqKod.focus();
            return;
          }
        }
      };
    }
  }
}



function ElanSikayetEmail() {
  var EmailYazildiKontrol = document.getElementById("elansikayet_email");
  var EmailFormatiKontrol = EMailKontrolEt(EmailYazildiKontrol);
  if (EmailYazildiKontrol.value == "") {
    document.getElementById("elansikayet_emaillabel").style.color = "#ff0000";
    document.getElementById("elansikayet_email").style.color = "#ff0000";
    var element = document.getElementById("elansikayet_email");
    element.classList.add("pleysoldercolor");
    document.getElementById("elansikayet_email").style.borderColor = "#ff0000";
    document.getElementById("elansikayet_email").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else if (EmailYazildiKontrol.value !== "") {
    var EmailFormati = document.getElementById("elansikayet_email").value;
    var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
    if (EmailFormatiKontrol == false) {
      document.getElementById("elansikayet_emaillabel").style.color = "#ff0000";
      document.getElementById("elansikayet_email").style.color = "#ff0000";
      var element = document.getElementById("elansikayet_email");
      element.classList.add("pleysoldercolor");
      document.getElementById("elansikayet_email").style.borderColor = "#ff0000";
      document.getElementById("elansikayet_email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      return;
    } else {
      document.getElementById("elansikayet_emaillabel").style.color = "#2A3F54";
      document.getElementById("elansikayet_email").style.color = "#2A3F54";
      var element = document.getElementById("elansikayet_email");
      element.classList.add("pleysoldercolor");
      document.getElementById("elansikayet_email").style.borderColor = "#2A3F54";
      document.getElementById("elansikayet_email").style.boxShadow =
      "0px 0px 0px 0px #2A3F54";
    }
  } else {
    document.getElementById("elansikayet_emaillabel").style.color = "#2A3F54";
    document.getElementById("elansikayet_email").style.color = "#2A3F54";
    var element = document.getElementById("elansikayet_email");
    element.classList.remove("pleysoldercolor");
    document.getElementById("elansikayet_email").style.borderColor = "#2A3F54";
    document.getElementById("elansikayet_email").style.boxShadow =
    "0px 0px 0px 0px #2A3F54";
  }
}


function ElanSikayetSebebiYazildi() {
  var MezmunKontrol = document.getElementById("sikayettextareyaid");
  if (MezmunKontrol.value == "") {
    document.getElementById("sikayettextareyaidlabel").style.color = "#ff0000";
    document.getElementById("sikayettextareyaid").style.color = "#ff0000";
    document.getElementById("sikayettextareyaid").style.borderColor = "#ff0000";
    document.getElementById("sikayettextareyaid").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("sikayettextareyaidlabel").style.color = "#2A3F54";
    document.getElementById("sikayettextareyaid").style.color = "#2A3F54";
    document.getElementById("sikayettextareyaid").style.borderColor = "#2A3F54";
    document.getElementById("sikayettextareyaid").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
  }
}







function ElanPinUnutmEmailKontrol() {
  var EmailYazildiKontrol = document.getElementById("pin_unutdum_email");
  var EmailFormatiKontrol = EMailKontrolEt(EmailYazildiKontrol);
  if (EmailYazildiKontrol.value == "") {
    document.getElementById("pin_unutdum_email_label").style.color = "#ff0000";
    document.getElementById("pin_unutdum_email").style.color = "#ff0000";
    var element = document.getElementById("pin_unutdum_email");
    element.classList.add("pleysoldercolor");
    document.getElementById("pin_unutdum_email").style.borderColor = "#ff0000";
    document.getElementById("pin_unutdum_email").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else if (EmailYazildiKontrol.value !== "") {
    var EmailFormati = document.getElementById("pin_unutdum_email").value;
    var EmailFormatiKontrol = EMailKontrolEt(EmailFormati);
    if (EmailFormatiKontrol == false) {
      document.getElementById("pin_unutdum_email_label").style.color = "#ff0000";
      document.getElementById("pin_unutdum_email").style.color = "#ff0000";
      var element = document.getElementById("pin_unutdum_email");
      element.classList.add("pleysoldercolor");
      document.getElementById("pin_unutdum_email").style.borderColor = "#ff0000";
      document.getElementById("pin_unutdum_email").style.boxShadow =
      "1px 0px 1px 0px #ff0000";
      return;
    } else {
      document.getElementById("pin_unutdum_email_label").style.color = "#2A3F54";
      document.getElementById("pin_unutdum_email").style.color = "#2A3F54";
      var element = document.getElementById("pin_unutdum_email");
      element.classList.add("pleysoldercolor");
      document.getElementById("pin_unutdum_email").style.borderColor = "#2A3F54";
      document.getElementById("pin_unutdum_email").style.boxShadow =
      "0px 0px 0px 0px #2A3F54";
    }
  } else {
    document.getElementById("pin_unutdum_email_label").style.color = "#2A3F54";
    document.getElementById("pin_unutdum_email").style.color = "#2A3F54";
    var element = document.getElementById("pin_unutdum_email");
    element.classList.remove("pleysoldercolor");
    document.getElementById("pin_unutdum_email").style.borderColor = "#2A3F54";
    document.getElementById("pin_unutdum_email").style.boxShadow =
    "0px 0px 0px 0px #2A3F54";
  }
}








/*Mənzillər elanları üçün şəhər seçildi*/
function AvtoElanSeherSecildi(seher_id) {
  document.getElementById("MenzilElanSeherSecilmedi").style.display = "none";
  document.getElementById("Menizl_elan_SeherLabel").style.color = "#2A3F54";
  document.getElementById("menzil_elan_seher_id").style.color = "#2A3F54";
  document.getElementById("menzil_elan_seher_id").style.borderColor = "#2A3F54";
  document.getElementById("menzil_elan_seher_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
  var RayonTelebEt = new XMLHttpRequest();
  RayonTelebEt.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ryontelebi").innerHTML = " ";
      document.getElementById("ryontelebi").innerHTML = this.responseText;
    }

  };
  RayonTelebEt.open("GET", "anliq_yenileme/avto_elanlari_rayon_telebi.php?seher_id=" + seher_id, true);
  RayonTelebEt.send();
}
/*Mənzillər elanları üçün şəhər seçildi*/






/*Mənzil Elanları üçün Şəhər yazıldı*/
function MenzilElanlariUcunSeherYazilmadii() {
  var AdYazildiKontrol = document.getElementById("MenzilElanlariUcunSeherYazilmadi");
  var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("MenzilElanlariUcunSeherYazilmadi");
  if (AdYazildiKontrol.value == "") {
    document.getElementById("MenzilElanlariUcunSeherYazilmadiSecim").style.display = "block";
    document.getElementById("MenzilElanlariUcunSeherYazilmadiLabel").style.color = "#ff0000";
    document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.color = "#ff0000";
    var element = document.getElementById("MenzilElanlariUcunSeherYazilmadi");
    element.classList.add("pleysoldercolor");
    document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.borderColor = "#ff0000";
    document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.boxShadow = "1px 0px 1px 0px #ff0000";
    return;
  } else {
    var UserAdFormatKontrol = AdSoyadAlaniniFiltirle("MenzilElanlariUcunSeherYazilmadi");
    document.getElementById("MenzilElanlariUcunSeherYazilmadiSecim").style.display = "none";
    document.getElementById("MenzilElanlariUcunSeherYazilmadiLabel").style.color = "#2A3F54";
    document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.color = "#2A3F54";
    var element = document.getElementById("MenzilElanlariUcunSeherYazilmadi");
    element.classList.remove("pleysoldercolor");
    document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.borderColor = "#2A3F54";
    document.getElementById("MenzilElanlariUcunSeherYazilmadi").style.boxShadow = "0px 0px 0px 0px #2A3F54";
  }
}

/*Mənzil Elanları üçün Şəhər yazıldı*/




/*Mənzillər elanları üçün rayon seçildi*/
function MenzilElanlarıUcunRayonSecildi(rayon_id) {
  document.getElementById("MenzillerUcunRayonYazilmadiSecim").style.display = "none";
  document.getElementById("menzil_elanlari_ucun_rayon_id_label").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_rayon_id").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_rayon_id").style.borderColor = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_rayon_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
  var MenzillerUcunNisangahtelebi = new XMLHttpRequest();
  MenzillerUcunNisangahtelebi.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("menzielanalriucunisangahid").innerHTML = " ";
      document.getElementById("menzielanalriucunisangahid").innerHTML = this.responseText;
    }

  };
  MenzillerUcunNisangahtelebi.open("GET", "anliq_yenileme/menzillerucunnisangahtelebi.php?rayon_id=" + rayon_id, true);
  MenzillerUcunNisangahtelebi.send();
}
/*Mənzillər elanları üçün rayon seçildi*/

/*Mənzillər elanları üçün metro seçildi*/
function MenzilElanlariUcunNisangahSecildi() {
  document.getElementById("MenzilElanlariUcunNisangahSecilmedi").style.display = "none";
  document.getElementById("menzil_elanlari_ucun_nisangah_label").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_nisangah").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_nisangah").style.borderColor = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_nisangah").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
}
/*Mənzillər elanları üçün metro seçildi*/






/*Mənzillər elanları üçün metro seçildi*/
function MenzilElanlarıUcunMetroSecildi() {
  document.getElementById("MenzilElanlariUcunMetroSecim").style.display = "none";
  document.getElementById("menzil_elanlari_ucun_metro_id_label").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_metro_id").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_metro_id").style.borderColor = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_metro_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
}
/*Mənzillər elanları üçün metro seçildi*/





/*Mənzil Elanları üçün Binanin Tipi Secildi*/
function MenzilElanlariUcunBinaTipiSecildi() {
  document.getElementById("MenzilBinaTipiSecilmedi").style.display = "none";
  document.getElementById("MenzilBinaTipiLabel").style.color = "#2A3F54";
  document.getElementById("menzil_binanin_tipi").style.color = "#2A3F54";
  document.getElementById("menzil_binanin_tipi").style.borderColor = "#2A3F54";
  document.getElementById("menzil_binanin_tipi").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}
/*Mənzil Elanları üçün Binanin Tipi Secildi*/



/*Mənzil Elanları üçün Binanin Təmir Vəziyyəti Secildi*/
function MenzilElanlariUcunBinaninTemirVeziyyetiSecildi() {
  document.getElementById("MenzilElanlariUcunEmlakVeziyyetiSecilmedi").style.display = "none";
  document.getElementById("menzil_elanlari_ucun_emlak_veziyyeti_id_label").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_emlak_veziyyeti_id").style.color = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_emlak_veziyyeti_id").style.borderColor = "#2A3F54";
  document.getElementById("menzil_elanlari_ucun_emlak_veziyyeti_id").style.boxShadow =
  " 0px 0px 0px 0px #2A3F54";
}
/*Mənzil Elanları üçün Binanin Təmir Vəziyyəti Secildi*/





function MenzilElanlariUcunEmlakinSenediSecildi() {
  document.getElementById("Menzil_Elanlari_Ucun_Emlak_Senedi_id_label").style.color = "#495057";
  document.getElementById("Menzil_Elanlari_Ucun_Emlak_Senedi_id").style.color = "#495057";
  document.getElementById("Menzil_Elanlari_Ucun_Emlak_Senedi_id").style.borderColor = "#ced4da";
  document.getElementById("Menzil_Elanlari_Ucun_Emlak_Senedi_id").style.boxShadow = " 1px 0px 1px 0px #ced4da";
}



function MenzilElanlariUcunMenzilinProyektSecildi() {
  document.getElementById("Menzil_Elanlari_Ucun_Proyekt_Id_label").style.color = "#495057";
  document.getElementById("Menzil_Elanlari_Ucun_Proyekt_Id").style.color = "#495057";
  document.getElementById("Menzil_Elanlari_Ucun_Proyekt_Id").style.borderColor = "#ced4da";
  document.getElementById("Menzil_Elanlari_Ucun_Proyekt_Id").style.boxShadow = " 1px 0px 1px 0px #ced4da";
}

















function MenzilElanlariUcunQiymetYazildi() {
  var AvtoYusrusKmKontrol = document.getElementById("MenzilElanlariUcunQiymetId");
  if (AvtoYusrusKmKontrol.value == "") {
    document.getElementById("MenzilElanlariUcunQiymetYazilmadi").style.display = "block";
    document.getElementById("MenzilElanlariUcunQiymetLabel").style.color = "#ff0000";
    document.getElementById("MenzilElanlariUcunQiymetId").style.color = "#ff0000";
    document.getElementById("MenzilElanlariUcunQiymetId").style.borderColor = "#ff0000";
    document.getElementById("MenzilElanlariUcunQiymetId").style.boxShadow = " 1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("MenzilElanlariUcunQiymetYazilmadi").style.display = "none";
    document.getElementById("MenzilElanlariUcunQiymetLabel").style.color = "#2A3F54";
    document.getElementById("MenzilElanlariUcunQiymetId").style.color = "#2A3F54";
    document.getElementById("MenzilElanlariUcunQiymetId").style.borderColor = "#2A3F54";
    document.getElementById("MenzilElanlariUcunQiymetId").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
  }
}


/*Villa Elanlari üçün villanin mertebe sayi secilmedi*/
function Villa_Elanlari_Mertebe_Sayi_Secildi() {
  document.getElementById("VillaElanlariUcunMetrtebeSayiSecilmedi").style.display = "none";
  document.getElementById("villa_elanlari_ucun_mertebe_sayi_label").style.color = "#2A3F54";
  document.getElementById("villa_elanlari_ucun_mertebe_sayi").style.color = "#2A3F54";
  document.getElementById("villa_elanlari_ucun_mertebe_sayi").style.borderColor = "#2A3F54";
  document.getElementById("villa_elanlari_ucun_mertebe_sayi").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
}
/*Villa Elanlari üçün villanin mertebe sayi secilmedi*/



/*Villa Elanlari Üçün torpaq sahəsi yazilmdai*/
function VillaElanlariUcunTorpaqSahesiYazildi() {
  var UmumisaheYazildiKontrol = document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id");
  if (UmumisaheYazildiKontrol.value == "") {
    document.getElementById("VillaElanlariUcunTorpaqSahesiYazilmadi").style.display = "block";
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_Label").style.color = "#ff0000";
    var element = document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id");
    element.classList.add("pleysoldercolor");
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.color = "#ff0000";
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.borderColor = "#ff0000";
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    UmumiSahesiKonturol.focus();
    return;
  } else {
    document.getElementById("VillaElanlariUcunTorpaqSahesiYazilmadi").style.display = "none";
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_Label").style.color = "#2A3F54";
    var element = document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id");
    element.classList.remove("pleysoldercolor");
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.color = "#2A3F54";
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.borderColor = "#2A3F54";
    document.getElementById("Villa_Elanlari_Ucun_Torbaq_Sahesi_id").style.boxShadow =
    " 0px 0px 0px 0px #2A3F54";
  }
}
/*Villa Elanlari Üçün torpaq sahəsi yazilmdai*/



/*Yeni Kohnelik seçildi*/
function YeniKohnelikSecildi() {
  document.getElementById("YeniVeYaKohnelikSecilmedi").style.display = "none";
  document.getElementById("yeniyox_label").style.color = "#2A3F54";
  document.getElementById("Yeni_label").style.color = "#2A3F54";
  document.getElementById("yenihe_label").style.color = "#2A3F54";
}
/*Yeni Kohnelik seçildi*/

/*Yeni Kohnelik seçildi*/
function DiskSecildi() {
  document.getElementById("DiskSecilmedi").style.display = "none";
  document.getElementById("disk_ssd_label").style.color = "#2A3F54";
  document.getElementById("disk_hdd_label").style.color = "#2A3F54";
  document.getElementById("disk_label").style.color = "#2A3F54";
}
/*Yeni Kohnelik seçildi*/



function ElanAdiTelefonYazildi() {
  var TelefonValue = document.getElementById("elan_adiTelefon").value;
  var TelefonUzunluq = TelefonValue.length;
  if (TelefonUzunluq !== 10) {
    document.getElementById("ElanAdTelefonYazilmadi").style.display = "block";
    document.getElementById("elan_adiTelefon_label").style.color = "#ff0000";
    document.getElementById("elan_adiTelefon").style.color = "#ff0000";
    var element = document.getElementById("elan_adiTelefon");
    element.classList.add("pleysoldercolor");
    document.getElementById("elan_adiTelefon").style.borderColor = "#ff0000";
    document.getElementById("elan_adiTelefon").style.boxShadow =
    "1px 0px 1px 0px #ff0000";
    return;
  } else {
    document.getElementById("ElanAdTelefonYazilmadi").style.display = "none";
    document.getElementById("elan_adiTelefon_label").style.color = "#2A3F54";
    document.getElementById("elan_adiTelefon").style.color = "#2A3F54";
    var element = document.getElementById("elan_adiTelefon");
    element.classList.remove("pleysoldercolor");
    document.getElementById("elan_adiTelefon").style.borderColor = "#2A3F54";
    document.getElementById("elan_adiTelefon").style.boxShadow =
    "1px 0px 1px 0px #2A3F54";
  }
}




/*Masa ustu komputerler ucun yaddas yazildi*/
function YaddasYazildi() {
  var YaddasYazildiKontrol = document.getElementById("yaddas");
  if (YaddasYazildiKontrol.value == "") {
    document.getElementById("YaddasYazilmadi").style.display = "block";
    document.getElementById("yaddas_label").style.color = "#ff0000";
    var element = document.getElementById("yaddas");
    element.classList.add("pleysoldercolor");
    document.getElementById("yaddas").style.color = "#ff0000";
    document.getElementById("yaddas").style.borderColor = "#ff0000";
    document.getElementById("yaddas").style.boxShadow =
    " 1px 0px 1px 0px #ff0000";
    UmumiSahesiKonturol.focus();
    return;
  } else {
    document.getElementById("YaddasYazilmadi").style.display = "none";
    document.getElementById("yaddas_label").style.color = "#2A3F54";
    var element = document.getElementById("yaddas");
    element.classList.remove("pleysoldercolor");
    document.getElementById("yaddas").style.color = "#2A3F54";
    document.getElementById("yaddas").style.borderColor = "#2A3F54";
    document.getElementById("yaddas").style.boxShadow =
    " 0px 0px 0px 0px #2A3F54";
  }
}
/*Masa ustu komputerler ucun yaddas yazildi*/

/*Masa ustu komputerler ucun operativ yaddas secildi*/
function OperativYaddasSecildi() {
  document.getElementById("OperativyaddasSecilmedi").style.display = "none";
  document.getElementById("operativyaddas_id_label").style.color = "#2A3F54";
  document.getElementById("operativyaddas_id").style.color = "#2A3F54";
  document.getElementById("operativyaddas_id").style.borderColor = "#2A3F54";
  document.getElementById("operativyaddas_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
}
/*Masa ustu komputerler ucun operativ yaddas secildi*/


/*Masa ustu komputerler ucun display duyum secildi*/
function DisplayDuyumSecildi() {
  document.getElementById("DisplayDuyumSecilmedi").style.display = "none";
  document.getElementById("display_duyum_id_label").style.color = "#2A3F54";
  document.getElementById("display_duyum_id").style.color = "#2A3F54";
  document.getElementById("display_duyum_id").style.borderColor = "#2A3F54";
  document.getElementById("display_duyum_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
}
/*Masa ustu komputerler ucun display duyum secildi*/

/*Masa ustu komputerler ucun video kart secildi secildi*/
function VideoKartSecildi() {
  document.getElementById("video_kart_Secilmedi").style.display = "none";
  document.getElementById("video_kart_id_label").style.color = "#2A3F54";
  document.getElementById("video_kart_id").style.color = "#2A3F54";
  document.getElementById("video_kart_id").style.borderColor = "#2A3F54";
  document.getElementById("video_kart_id").style.boxShadow = " 0px 0px 0px 0px #2A3F54";
}
/*Masa ustu komputerler ucun video kart secildi secildi*/



