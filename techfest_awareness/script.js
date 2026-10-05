const form=document.querySelector("#drawForm");
const message=document.querySelector("#message");
form.addEventListener("submit",async e=>{e.preventDefault();
    const payload={
         name:document.querySelector("#name").value.trim(),
         email:document.querySelector("#email").value.trim(),
         mobile:document.querySelector("#mobile").value.trim(),
         place:document.querySelector("#place").value.trim()
        };
        message.textContent="Submitting...";
        try{
            const r=await fetch("api/register.php",{
                method:"POST",
                headers:{"Content-Type":"application/json"},
                body:JSON.stringify(payload)});
                const d=await r.json();
                if(!r.ok||!d.success)throw new Error(d.message||"Registration failed.");
                message.textContent=d.message;form.reset()}
                catch(err){
                    message.textContent=err.message;message.className="message error"}
                });