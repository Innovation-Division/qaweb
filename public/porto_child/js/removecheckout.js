var CheckoutOnepage = Class.create(Checkout, {
    initialize: function($super,accordion, urls){
        $super(accordion, urls);
        this.steps = ['billing', 'payment', 'review'];
    },
    setMethodGuest: function(){
        Element.hide('register-customer-password');
    }
});
