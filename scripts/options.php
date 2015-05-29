<div id="cart_wrap">
                            	<div id="cart_header">
                                	Masuk atau <a href="daftar.php" style="text-decoration:none; color: #FFF;">Daftar</a>
                                </div>
                                <div id="cart_body">
                                
                                </div>
                              </div>
                              <br/>
                              <form action="index.php" method="post">
                              <table width="160" cellspacing="3" cellpadding="3" border="0">
                              	  <tr>
                              		   <td><input type="email" name="email" class="text_input" style="width:170px; height:25px;" maxlength="50" placeholder=" Alamat Email"/></td>
                              	  </tr>
                                  <tr>
                              		   <td><input type="password" name="password" class="text_input" style="width:170px; height:25px;" maxlength="15" placeholder=" Kata Sandi"/></td>
                              	  </tr>
                                  <tr>
                              		   <td><input type="submit" name="submit" value="Masuk" id="button" style=" width:70px; height:30px;"/></td>
                              	  </tr>
                                  <tr>
                              		   <td><?php echo $msg_error; ?></td>
                              	  </tr>
                              </table>
                              </form>