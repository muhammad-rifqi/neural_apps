@extends('layouts.apps')

@section('content')   

<style>
    .log-box { background: #111; color: #0f0; padding: 10px; height: 550px; overflow-y: auto; font-size: 13px; }
    .progress-bar { width: 100%; background: #ddd; border-radius: 5px; margin: 10px 0; }
    .progress { height: 20px; width: 0%; background: #4caf50; border-radius: 5px; text-align: center; color: #fff; }
    button { padding: 10px; margin: 5px; cursor: pointer; }
    .metrics { margin-top: 18px; }
    .metrics p { margin: 6px 0; }
  </style>

    <div class="container">
        <h1 align="center" style="margin-top: 80px;">Great to see you, {{Auth::user()->name}}! Let’s boost performance with retraining.</h1>
        <p class="subtitle" align="center">
        Configure and initiate the retraining process to update and improve the accuracy of your predictive machine learning models.
        </p>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped w-100">
                        <thead>
                        <tr>
                            <th colspan="2">Current Status Model</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Confusion Matrix</td>
                            <td><input type="text" class="form-control" id="acc" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>Accuracy Score</td>
                            <td><input type="text" class="form-control" id="nbacc" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>Hybrid Accuracy</td>
                            <td><input type="text" class="form-control" id="hybrid" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>Precision</td>
                            <td><input type="text" class="form-control" id="prec" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>Recall</td>
                            <td> <input type="text" class="form-control"  id="rec" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>F1-Score</td>
                            <td><input type="text" class="form-control" id="f1" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>ROC-AUC</td>
                            <td><input type="text" class="form-control" id="roc" value="0 %" readonly></td>
                        </tr>
                        <tr>
                            <td>Data Scope <span class="text-primary">●</span></td>
                            <td>
                            <select class="form-control">
                                <option>Saving checkpoint_model_epoch_5.h5</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Training Epochs <span class="text-primary">●</span></td>
                            <td><input type="text" class="form-control" value="50" readonly></td>
                        </tr>
                        <tr>
                            <td>Amount of training</td>
                            <td><input type="text" class="form-control" value="✓ Training complete" readonly></td>
                        </tr>
                        <tr>
                            <td>Initiate Retraining</td>
                            <td> <div class="progress-bar">
                                    <div id="progress" class="progress">0%</div>
                                </div> 
                                <button id="startBtn" class="btn btn-default btn-block">Initiate Retraining</button> 
                                <button class="btn btn-default btn-block" id="saveBtn">Save Model</button> 
                                <button id="loadBtn" hidden> Load Model</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                <table class="table table-bordered w-100">
                    <thead>
                    <tr>
                        <th>Last Retrained</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                        <input type="text" class="form-control mb-2" value="<?= date('Y-m-d');?>" readonly>
                        <div class="log-box" id="logBox"></div>    
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    const logBox = document.getElementById("logBox");
    const progressBar = document.getElementById("progress");
    const accSpan = document.getElementById("acc");
    const nbAccSpan = document.getElementById("nbacc");
    const hybridSpan = document.getElementById("hybrid");
    const precSpan = document.getElementById("prec");
    const recSpan = document.getElementById("rec");
    const f1Span = document.getElementById("f1");
    const rocSpan = document.getElementById("roc");

    let trainedModel = null;
    let trainedNB = null;

    function addLog(txt) {
      logBox.innerHTML += txt + "<br>";
      logBox.scrollTop = logBox.scrollHeight;
    }

    // ===== Gaussian Naive Bayes sederhana =====
    class GaussianNB {
      constructor(epsilon = 1e-9) {
        this.epsilon = epsilon;
        this.classes = [];
        this.classPrior = {};
        this.means = {};
        this.vars = {};
      }
      fit(X, y) {
        const n = X.length;
        const nFeatures = X[0].length;
        const classMap = {};
        for (let i = 0; i < y.length; i++) {
          const c = y[i];
          classMap[c] = classMap[c] || [];
          classMap[c].push(X[i]);
        }
        this.classes = Object.keys(classMap).map(k => Number(k));
        for (const c of this.classes) {
          const rows = classMap[c];
          const count = rows.length;
          this.classPrior[c] = count / n;
          const mean = new Array(nFeatures).fill(0);
          for (let r of rows) for (let j = 0; j < nFeatures; j++) mean[j] += r[j];
          for (let j = 0; j < nFeatures; j++) mean[j] /= count;
          const varr = new Array(nFeatures).fill(0);
          for (let r of rows) for (let j = 0; j < nFeatures; j++) {
            const d = r[j] - mean[j]; varr[j] += d * d;
          }
          for (let j = 0; j < nFeatures; j++) varr[j] = varr[j] / count + this.epsilon;
          this.means[c] = mean; this.vars[c] = varr;
        }
      }
      _logProb(x, c) {
        const mean = this.means[c], varr = this.vars[c];
        let logProb = Math.log(this.classPrior[c] + 1e-12);
        for (let j = 0; j < x.length; j++) {
          const diff = x[j] - mean[j];
          logProb += -0.5 * Math.log(2 * Math.PI * varr[j]) - (diff * diff) / (2 * varr[j]);
        }
        return logProb;
      }
      predictSingle(x) {
        let bestC = null, bestLog = -Infinity;
        for (const c of this.classes) {
          const lp = this._logProb(x, c);
          if (lp > bestLog) { bestLog = lp; bestC = c; }
        }
        return bestC;
      }
      predict(X) { return X.map(x => this.predictSingle(x)); }
      toJSON() {
        return JSON.stringify({
          epsilon: this.epsilon, classes: this.classes,
          classPrior: this.classPrior, means: this.means, vars: this.vars
        });
      }
      static fromJSON(jsonStr) {
        const obj = JSON.parse(jsonStr);
        const nb = new GaussianNB(obj.epsilon);
        nb.classes = obj.classes; nb.classPrior = obj.classPrior;
        nb.means = obj.means; nb.vars = obj.vars;
        return nb;
      }
    }

    // ===== Metrics =====
    function calculateMetrics(y_true, y_prob, threshold=0.5) {
      let TP=0,TN=0,FP=0,FN=0;
      for (let i=0;i<y_true.length;i++){
        const actual=y_true[i]; const pred=(y_prob[i]>=threshold)?1:0;
        if(pred===1&&actual===1)TP++;
        if(pred===0&&actual===0)TN++;
        if(pred===1&&actual===0)FP++;
        if(pred===0&&actual===1)FN++;
      }
      const precision=TP+FP===0?0:TP/(TP+FP);
      const recall=TP+FN===0?0:TP/(TP+FN);
      const f1=(precision+recall===0)?0:(2*precision*recall)/(precision+recall);
      // ROC-AUC sederhana
      const thresholds=[...Array(101).keys()].map(i=>i/100);
      const tpr=[], fpr=[];
      for(let t of thresholds){
        let tp=0,fn=0,fp=0,tn=0;
        for(let i=0;i<y_true.length;i++){
          const pr=(y_prob[i]>=t)?1:0; const ac=y_true[i];
          if(pr===1&&ac===1)tp++; if(pr===0&&ac===1)fn++;
          if(pr===1&&ac===0)fp++; if(pr===0&&ac===0)tn++;
        }
        const _tpr=(tp+fn===0)?0:tp/(tp+fn);
        const _fpr=(fp+tn===0)?0:fp/(fp+tn);
        tpr.push(_tpr); fpr.push(_fpr);
      }
      let auc=0;
      for(let i=1;i<fpr.length;i++){
        const dx=Math.abs(fpr[i]-fpr[i-1]);
        const avgY=(tpr[i]+tpr[i-1])/2;
        auc+=dx*avgY;
      }
      return {precision,recall,f1,roc_auc:auc};
    }

    // ===== Training Hybrid =====
    document.getElementById("startBtn").addEventListener("click", async ()=>{
      addLog("[INFO] Mulai retraining...");
      progressBar.style.width="0%"; progressBar.innerText="0%";

      const numSamples=2200,numFeatures=10;
      const xs=tf.randomNormal([numSamples,numFeatures]);
      const ys=tf.randomUniform([numSamples,1]).greater(tf.scalar(0.5)).toFloat();
      const xsArray=await xs.array();
      const ysArray=(await ys.array()).map(v=>v[0]);

      // ANN
      const model=tf.sequential();
      model.add(tf.layers.dense({units:32,activation:"relu",inputShape:[numFeatures]}));
      model.add(tf.layers.dense({units:16,activation:"relu"}));
      model.add(tf.layers.dense({units:1,activation:"sigmoid"}));
      model.compile({optimizer:"adam",loss:"binaryCrossentropy",metrics:["accuracy"]});
      const epochs=8;
      addLog("[INFO] Training ANN ("+epochs+" epochs)...");
      await model.fit(xs,ys,{
        epochs,batchSize:32,validationSplit:0.2,
        callbacks:{
          onEpochEnd:async(epoch,logs)=>{
            const p=Math.round(((epoch+1)/epochs)*100);
            progressBar.style.width=p+"%"; progressBar.innerText=p+"%";
            addLog(`[EPOCH ${epoch+1}/${epochs}] loss=${logs.loss.toFixed(4)}, acc=${(logs.acc*100).toFixed(2)}%`);
            await tf.nextFrame();
          }
        }
      });
      const evalRes=model.evaluate(xs,ys);
      const annAcc=(await evalRes[1].data())[0];
      accSpan.value=(annAcc*100).toFixed(2)+"%";

      const annPredArray=(await model.predict(xs).array()).map(a=>a[0]);

      // NB
      const gnb=new GaussianNB(); gnb.fit(xsArray,ysArray);
      const nbPreds=gnb.predict(xsArray);
      let nbCorrect=0; for(let i=0;i<ysArray.length;i++)if(nbPreds[i]===ysArray[i])nbCorrect++;
      const nbAcc=nbCorrect/ysArray.length;
      nbAccSpan.value=(nbAcc*100).toFixed(2)+"%";

      // Hybrid
      let hybridCorrect=0; const hybridPreds=[];
      for(let i=0;i<xsArray.length;i++){
        const annVote=annPredArray[i]>=0.5?1:0;
        const nbVote=nbPreds[i];
        const hv=(annVote+nbVote)>=1?1:0;
        hybridPreds.push(hv);
        if(hv===ysArray[i])hybridCorrect++;
      }
      const hybridAcc=hybridCorrect/ysArray.length;
    //   hybridSpan.innerText=(hybridAcc*100).toFixed(2)+"%";
       hybridSpan.value=(hybridAcc*100).toFixed(2)+"%";

      // Metrics
      const metrics=calculateMetrics(ysArray,annPredArray,0.5);
      precSpan.value=(metrics.precision*100).toFixed(2)+"%";
      recSpan.value=(metrics.recall*100).toFixed(2)+"%";
      f1Span.value=(metrics.f1*100).toFixed(2)+"%";
      rocSpan.value=(metrics.roc_auc*100).toFixed(2)+"%";

      addLog("✔ Retraining selesai.");

      trainedModel=model;
      trainedNB=gnb;
    });

    // ===== Save & Load =====
    document.getElementById("saveBtn").addEventListener("click", async()=>{
      if(!trainedModel||!trainedNB){addLog("❌ Belum ada model terlatih");return;}
      await trainedModel.save("downloads://hybrid_ann_model");
      const nbJSON=trainedNB.toJSON();
      const blob=new Blob([nbJSON],{type:"application/json"});
      const url=URL.createObjectURL(blob);
      const a=document.createElement("a");
      a.href=url; a.download="naive_bayes_model.json"; a.click();
      addLog("💾 Model ANN & NB disimpan.");
    });

    document.getElementById("loadBtn").addEventListener("click", async()=>{
      const [annHandle]=await window.showOpenFilePicker({types:[{description:"ANN model",accept:{"application/json":[".json"]}}]});
      const annFile=await annHandle.getFile();
      const annUrl=URL.createObjectURL(annFile);
      const model=await tf.loadLayersModel(annUrl);
      addLog("📂 ANN model loaded.");

      const [nbHandle]=await window.showOpenFilePicker({types:[{description:"NB model",accept:{"application/json":[".json"]}}]});
      const nbFile=await nbHandle.getFile();
      const nbText=await nbFile.text();
      const nb=GaussianNB.fromJSON(nbText);
      addLog("📂 Naive Bayes model loaded.");

      trainedModel=model; trainedNB=nb;
    });
  </script>

@endsection