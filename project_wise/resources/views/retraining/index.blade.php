@extends('layouts.apps')

@section('content')   
<?php  $value = '
[INFO] Starting model retraining...
[INFO] Model: Hybrid (GradientBoosting + ANN + NaiveBayes)
[INFO] Dataset loaded: 2,200 project records
[INFO] Batch Size: 32 | Epochs: 50
Epoch 1/50
[=====➤----------------------] 30% | loss: 0.7456 | acc: 0.63 | val_loss: 0.7201 | val_acc: 0.65 | ETA: 00:08
Epoch 2/50
[===========➤--------------] 50% | loss: 0.6902 | acc: 0.68 | val_loss: 0.6823 | val_acc: 0.67 | ETA: 00:06
Epoch 3/50
[===================➤------] 70% | loss: 0.6551 | acc: 0.71 | val_loss: 0.6504 | val_acc: 0.69 | ETA: 00:04
Epoch 4/50
[========================➤] 90% | loss: 0.6210 | acc: 0.75 | val_loss: 0.6305 | val_acc: 0.72 | ETA: 00:02
Epoch 5/50
[===========================] 100% | loss: 0.6002 | acc: 0.77 | val_loss: 0.6129 | val_acc: 0.74
Saving checkpoint: model_epoch_5.h5
...
Epoch 50/50
[===========================] 100% | loss: 0.5121 | acc: 0.84 | val_loss: 0.5734 | val_acc: 0.79

[✓] Training complete.
[✓] Model saved: ./models/hybrid_model_final.h5
[INFO] Total time: 00:21:43 '; ?>



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
                                            <td><input type="text" class="form-control" value="86.55%" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Accuracy Score</td>
                                            <td><input type="text" class="form-control" value="81.71%" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Precision</td>
                                            <td><input type="text" class="form-control" value="89.32%" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Recall</td>
                                            <td> <input type="text" class="form-control" value="93.76%" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>F1-Score</td>
                                            <td><input type="text" class="form-control" value="83.85%" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>ROC-AUC</td>
                                            <td><input type="text" class="form-control" value="85.78%" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Data Scope <span class="text-primary">●</span></td>
                                            <td>
                                            <select class="form-control">
                                                <option>Choose time frame</option>
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
                                            <td><button class="btn btn-default btn-block">Initiate Retraining</button></td>
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
                                        <input type="text" class="form-control mb-2" value="2025-12-12" readonly>
                                            <textarea class="form-control" cols="10" rows="30"  style='font-size: 12px' readonly>
                                                    {{ $value }}
                                            </textarea>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection