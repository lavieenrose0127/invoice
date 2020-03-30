var invoice = {
    const: {
        cmpCtrElmClass: '__invoice_company_operator' ,
        invoiceCtrElmClass: '__invoice_value_operator' ,
        unitMassElmClass: '__invoice_value_unitMass' ,
        totalMassElmClass: '__invoice_value_totalMass' ,
    },

    calcUnit: {
        time: { value: 1 , elmClass: '__invoice_unit_time' } ,
        price: { value: 1000 , elmClass: '__invoice_unit_price' } ,
    },

    tax: { value: 1.1 , elmClass: '__invoice_tax' , defultRate: 1.1 },
    
    targetObject: null, 
    unitMass: 0,
    totalMass: 0,
    
    init: function (){
        $( '.' + invoice.const.cmpCtrElmClass ).on( 'change', function(e){ invoice.cmpChange(e);} );
        $( '.' + invoice.const.invoiceCtrElmClass ).on( 'change', function(e){ invoice.valueChange(e);} );
    },

    cmpChange: function(){
        //
    },

    valueChange: function(e){
        //　EventTargets設置
        invoice.setTargetObject( e.target );
        //　時間取得
        invoice.getUnitTime();
        //　単価取得
        invoice.getUnitPrice();
        //　税
        invoice.getTaxRate();
        //　小計算出
        invoice.calcUnitMass();
        //　小計反映
        invoice.relectUnitMass();
        //　合計反映
        invoice.reflectTotalMass();
    },

    setTargetObject: function( object ){
        invoice.targetObject = object;
    },

    getUnitTime: function(){
        invoice.calcUnit.time.value = $( invoice.targetObject ).closest('section').find( '.' + invoice.calcUnit.time.elmClass ).val();
    },

    getUnitPrice: function(){
        invoice.calcUnit.price.value = $( invoice.targetObject ).closest('section').find( '.' + invoice.calcUnit.price.elmClass ).val();
    },
    

    getTaxRate: function(){
        if( $( invoice.targetObject ).closest('section').find( '.' + invoice.tax.elmClass + ':checked' ).val() === '1' ){
            invoice.tax.value = invoice.tax.defultRate;
        }else{
            invoice.tax.value = 1;
        }
    },


    calcUnitMass: function(){
        var u = 1;
        $.each( invoice.calcUnit, function( index, item ){ 
            u = u * item.value;
        });

        invoice.unitMass = Math.round( u * invoice.tax.value );
    },

    relectUnitMass: function( unitmass ){
        $( invoice.targetObject ).closest('section').find( '.' + invoice.const.unitMassElmClass ).val( invoice.unitMass );
    },

    reflectTotalMass: function(){
        $( '.' + invoice.const.unitMassElmClass ).each(function( index, element ){
            invoice.totalMass += parseInt( $(element).val() );
        });

        $( '.' + invoice.const.totalMassElmClass ).val(invoice.totalMass);
    
        invoice.resetTotalMassValue();
    },

    resetTotalMassValue: function(){
        invoice.totalMass = 0;
    }

};

invoice.init();
