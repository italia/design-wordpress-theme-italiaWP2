/* Italian initialisation for the jQuery UI date picker plugin. */
/* Written by Antonello Pasella (antonello.pasella@gmail.com). */
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.it = {
	closeText: "Chiudi",
	prevText: "&#x3C;Prec",
	nextText: "Succ&#x3E;",
	currentText: "Oggi",
	monthNames: [ "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
		"Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre" ],
	monthNamesShort: [ "Gen","Feb","Mar","Apr","Mag","Giu",
		"Lug","Ago","Set","Ott","Nov","Dic" ],
	dayNames: [ "Domenica","Luned&igrave;","Marted&igrave;","Mercoled&igrave;","Gioved&igrave;","Venerd&igrave;","Sabato" ],
	dayNamesShort: [ "Dom","Lun","Mar","Mer","Gio","Ven","Sab" ],
	dayNamesMin: [ "D","L","M","M","G","V","S" ],
	weekHeader: "Sm",
	dateFormat: "dd/mm/yy",
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.it );

return datepicker.regional.it;

} ) );
