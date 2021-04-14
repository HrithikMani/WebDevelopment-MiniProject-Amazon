const express = require('express')
const app = express()
const d = require('dialogflow-fulfillment');
app.post('/',express.json(), function (req, res) {
    const agent = new d.WebhookClient({request: req, response:res});
    function demo(agent){
        agent.add("Sending response from webhook server");
    }
    function custom(agent){
        var p = {"richContent": [
            [
              {
                "type": "info",
                "title": "Info item title",
                "subtitle": "Info item subtitle",
                "image": {
                  "src": {
                    "rawUrl": "https://example.com/images/logo.png"
                  }
                },
                "actionLink": "https://example.com"
              }
            ],
            [
                {
                  "type": "info",
                  "title": "Info item title",
                  "subtitle": "Info item subtitle",
                  "image": {
                    "src": {
                      "rawUrl": "https://example.com/images/logo.png"
                    }
                  },
                  "actionLink": "https://example.com"
                }
              ]

          ]
        };
          //agent.add("hi");
          agent.add(new d.Payload(agent.UNSPECIFIED,p,{sendAsMessage:true,rawPayload:true}));
    }
    var intentmap = new Map();
    intentmap.set('webhookdemon',demo);
    intentmap.set('custompayload',custom);
    agent.handleRequest(intentmap);
});
app.get("/",(req,res)=>{
    res.send("hi");
});
 
app.listen(3000,()=> console.log("we r live"));