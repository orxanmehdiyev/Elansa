function KullaniciAdiAlanlariIciniFiltrle(Deyer){
	var FormElemani					      =	Deyer;
	var FormElemaniIcerikDeyeri		=	document.getElementById(FormElemani).value;
	var DeyisimSonucu				      =	FormElemaniIcerikDeyeri.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜüƏə_\-\.@]/g, "");
	document.getElementById(FormElemani).value	=	DeyisimSonucu;
	return;
}

function KullaniciSifresiAlanlariIcinFiltrle(Deyer){
	var FormElemani					=	Deyer;
	var FormElemaniIcerikDeyeri		=	document.getElementById(FormElemani).value;
	var DeyisimSonucu				=		FormElemaniIcerikDeyeri.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜüƏə\.\:\+\-\_\#\?\!\*\&\/\=\%\~\@]/g, "");
	document.getElementById(FormElemani).value	=	DeyisimSonucu;
	return;
}

function KullaniciCaptchaAlanlariIciniFiltrle(Deyer){
	var FormElemani					      =	Deyer;
	var FormElemaniIcerikDeyeri		=	document.getElementById(FormElemani).value;
	var DeyisimSonucu				      =	FormElemaniIcerikDeyeri.replace(/[^a-zA-Z0-9ÇçĞğİıÖöŞşÜüƏə]/g, "");
	document.getElementById(FormElemani).value	=	DeyisimSonucu;
	return;
}


function DosyaAdiYazdir(FormElemaniDegeri, DosyaAdiAlaniDegeri, SecimIptalAlaniDegeri){
	var FormElemani											=	FormElemaniDegeri;
	var DosyaAdiAlani										=	DosyaAdiAlaniDegeri;
	var SecimIptalAlani										=	SecimIptalAlaniDegeri;
	var SecilenDosya										=	document.getElementById(FormElemani).value;
	var SecilenDosyaAdiniDuzenle							=	SecilenDosya.replace("C:\\fakepath\\", "");
	document.getElementById(DosyaAdiAlani).innerHTML		=	SecilenDosyaAdiniDuzenle;
	document.getElementById(SecimIptalAlani).style.display	=	"inline-block";
}

function DosyaAdiSifirla(FormElemaniDeyeri, DosyaAdiAlaniDeyeri, SecimIptalAlaniDeyeri){
	var FormElemani											=	FormElemaniDeyeri;
	var DosyaAdiAlani										=	DosyaAdiAlaniDeyeri;
	var SecimIptalAlani										=	SecimIptalAlaniDeyeri;
	document.getElementById(FormElemani).value				=	"";
	document.getElementById(DosyaAdiAlani).innerHTML		=	"";
	document.getElementById(SecimIptalAlani).style.display	=	"none";
}


function IngilizceyeGoreKucukHarfBuyukHarfDegistir(Deger){
	var GelenDeger		=	document.getElementById(Deger).value;	
	var IcerikNesnesi				=	{"a":"A", "b":"B", "c":"C", "ç":"C", "d":"D", "e":"E", "f":"F", "g":"G", "ğ":"G", "h":"H", "ı":"I", "i":"I", "j":"J", "k":"K", "l":"L", "m":"M", "n":"N", "o":"O", "ö":"O", "p":"P", "r":"R", "s":"S", "ş":"S", "t":"T", "u":"U", "ü":"U", "v":"V", "y":"Y", "z":"Z", "q":"Q", "w":"W", "x":"X"};
	var DegisimSonucu				=	GelenDeger.replace(/[a-zçğıöşü]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	document.getElementById(Deger).value	=	DegisimSonucu;
	return DegisimSonucu;
}

function KicikHerfleriBoyukHerfeDeyis(Deger){
	var GelenDeger		=	document.getElementById(Deger).value;	
	var IcerikNesnesi				=	{"a":"A", "b":"B", "c":"C", "ç":"Ç", "d":"D", "e":"E", "f":"F", "g":"G", "ğ":"Ğ", "h":"H", "ı":"I", "i":"İ", "j":"J", "k":"K", "l":"L", "m":"M", "n":"N", "o":"O", "ö":"Ö", "p":"P", "r":"R", "s":"S", "ş":"Ş", "t":"T", "u":"U", "ü":"Ü", "v":"V", "y":"Y", "z":"Z", "q":"Q", "w":"W", "x":"X", "ə":"Ə"};
	var DegisimSonucu				=	GelenDeger.replace(/[a-zçğıöşüə]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	document.getElementById(Deger).value	=	DegisimSonucu;
	return DegisimSonucu;
}

function AzerbaycanHerfleriniIngilisHerflereDeyisdir(Deger){
	var FormElemaniIcerikDegeri		=	document.getElementById(Deger).value;	
	var IcerikNesnesi				=	{"Ç":"C", "ç":"c", "Ğ":"G", "ğ":"g", "İ":"I", "ı":"i", "Ö":"O", "ö":"o", "Ş":"S", "ş":"s", "Ü":"U", "ü":"u", "Ə":"E", "ə":"e"};
	var DegisimSonucu				=	FormElemaniIcerikDegeri.replace(/[ÇçĞğİıÖöŞşÜüƏə]/g, function(Harf){ return IcerikNesnesi[Harf]; });
	document.getElementById(Deger).value	=	DegisimSonucu;
	return;
}

function UluslararasiKodAlanlariIcinFiltrele(Deger){
	var FormElemani					=	Deger;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var IcerikNesnesiBir				=	{"Ç":"C", "ç":"c", "Ğ":"G", "ğ":"g", "İ":"I", "ı":"i", "Ö":"O", "ö":"o", "Ş":"S", "ş":"s", "Ü":"U", "ü":"u", "Ə":"E", "ə":"e"};
	var DegisimSonucuBir				=	FormElemaniIcerikDegeri.replace(/[ÇçĞğİıÖöŞşÜüƏə]/g, function(Harf){ return IcerikNesnesiBir[Harf]; });
	var IcerikNesnesiIki				=	{"a":"A", "b":"B", "c":"C", "ç":"C", "d":"D", "e":"E", "f":"F", "g":"G", "ğ":"G", "h":"H", "ı":"I", "i":"I", "j":"J", "k":"K", "l":"L", "m":"M", "n":"N", "o":"O", "ö":"O", "p":"P", "r":"R", "s":"S", "ş":"S", "t":"T", "u":"U", "ü":"U", "v":"V", "y":"Y", "z":"Z", "q":"Q", "w":"W", "x":"X"};
	var HarfleriDegistir				=	DegisimSonucuBir.replace(/[a-zçğıöşü]/g, function(Harf){ return IcerikNesnesiIki[Harf]; });
	var DegisimSonucu				=	HarfleriDegistir.replace(/[^A-Z0-9]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}


function HeriflerXarixButunKarakterleriSil(Deyer){
	var FormElemani					      =	Deyer;
	var FormElemaniIcerikDeyeri		=	document.getElementById(FormElemani).value;
	var DeyisimSonucu				      =	FormElemaniIcerikDeyeri.replace(/[^a-zA-ZÇçĞğİıÖöŞşÜüƏə]/g, "");
	document.getElementById(FormElemani).value	=	DeyisimSonucu;
	return;
}


function HerifVeReqemlerXarixButunKarakterleriSil(Deyer){
	var FormElemani					      =	Deyer;
	var FormElemaniIcerikDeyeri		=	document.getElementById(FormElemani).value;
	var DeyisimSonucu				      =	FormElemaniIcerikDeyeri.replace(/[^0-9a-zA-ZÇçĞğİıÖöŞşÜüƏə]/g, "");
	document.getElementById(FormElemani).value	=	DeyisimSonucu;
	return;
}


function ReqemlerXaricButunKarakterleriSil(Deyer){
	var FormElemani					=	Deyer;
	var FormElemaniIcerikDegeri		=	document.getElementById(FormElemani).value;
	var DegisimSonucu				=	FormElemaniIcerikDegeri.replace(/[^0-9]/g, "");
	document.getElementById(FormElemani).value	=	DegisimSonucu;
	return;
}


function EMailKontrolEt(Deyer){
	var EMailKontrolYapisi		=	/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var KontrolEt				=	EMailKontrolYapisi.test(Deyer);
	return KontrolEt;
}