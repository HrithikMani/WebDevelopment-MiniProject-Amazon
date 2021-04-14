const express = require("express")
const app = new express();
const d = require("dialogflow-fulfillment");


app.post("/",express.json(),function(req,res){
    var agent = new d.WebhookClient({request:req,response:res});
    var intent = new Map();

    
    
    function demo(agent){
        var p = {
            "richContent": 
            [
                [
              {
                "type": "info",
                "title": "Acer",
                "subtitle": "Laptop",
                "image": {
                  "src": {
                    "rawUrl": "https://example.com/images/logo.png"
                  }
                },
                "actionLink": "http://localhost/amazon/order.php?c=Electronics&&pid=3"
              }
            ],
            [
                {
                  "type": "info",
                  "title": "Acer",
                  "subtitle": "Laptop",
                  "image": {
                    "src": {
                      "rawUrl": "https://example.com/images/logo.png"
                    }
                  },
                  "actionLink": "http://localhost/amazon/order.php?c=Electronics&&pid=1"
                }
              ]
            ]
        };
        agent.add(new d.Payload(agent.UNSPECIFIED,p,{sendAsMessage:true,rawPayload:true}));
    }


    intent.set('demo',demo);
    agent.handleRequest(intent);
});


app.get("/",function(req,res){
    res.send("hui");
});




app.listen(3000);