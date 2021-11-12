@extends('layouts.admin')

@section('admin-content')

  <x-admin.header.show-component name="{{ __('Message') }}" plural-name="{{ __('Messages') }}" :title="$message->name.' - '.$message->email" :index-link="route('admin.messages.inbox.index')" :create-link="route('admin.messages.create')" />

    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" style="background-color: #013c59;" width="100%">
      <tbody>
        <tr>
          <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" style="background-color: #fff !important; color: #000000;" width="640">
                      <tbody>
                        <tr>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top; border:0px" width="25%">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                <td style="width:100%;padding: 5px 0px;">
                                  <div align="center" style="line-height:10px"><img alt="Logo" src="http://datavis.samuel-thibault.fr/storage/img/logos/mDic6DI5asAfo4fLvivqVNU7xHmHqKUqnqV8IKC6.png" style="display: block; height: auto; border: 0; width: 80px; max-width: 100%;" width="80"/></div>
                                </td>
                              </tr>
                            </table>
                          </th>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top; border:0px" width="75%">
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                              <tr>
                                <td style="padding-top:15px;padding-right:10px;padding-bottom:15px;">
                                  <div style="font-family: Verdana, sans-serif">
                                    <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 18px; color: #013c59 !important; line-height: 1.5;">
                                      <p style="margin: 0; font-size: 12px; text-align: left;"><strong><span style="color:#013c59;font-size:26px;"><span style="">{{ config('app.name', 'Laravel') }}</span></span></strong></p>
                                      <p style="margin: 0; font-size: 12px; text-align: left; mso-line-height-alt: 21px;"><span style="color:#6c757d;font-size:14px;"><em><span style=""><span style="">By Samuel Thibault</span></span></em></span></p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" style="background-color: #fff !important; color: #000000;" width="640">
                      <tbody>
                        <tr>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border:0px" width="100%">
                            <table border="0" cellpadding="10" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                              <tr>
                                <td>
                                  <div style="font-family: Verdana, sans-serif">
                                    <div style="font-size: 14px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 16.8px; line-height: 1.2;">
                                      <p style="margin: 0; font-size: 14px; text-align: center;"><strong><span style="font-size:30px;color:#013c59;">{{ $message->name }}</span></strong></p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" style="background-color: #fff !important; color: #000000;" width="640">
                      <tbody>
                        <tr>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border:0px" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                <td style="width:100%;padding-right:0px;padding-left:0px;">
                                  <div align="center" style="line-height:10px"><img alt="Hero image" class="big" src="http://datavis.samuel-thibault.fr/storage/img/heros/9NxGphlmTKSFkccfkfCivo8j1FJsdyIFuv5XJlTm.jpeg" style="display: block; height: auto; border: 0; width: auto !important; max-width: 100%;" width="640"/></div>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="40" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                              <tr>
                                <td>
                                  <div style="font-family: Verdana, sans-serif">
                                    <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #013c59 !important; line-height: 1.2;">
                                      <p style="margin: 0; font-size: 16px; text-align: center;"><strong><span style="font-size:30px;color:#2b303a;">{{ $message->subject }}</span></strong></p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" style="background-color: #013c59; color: #000000;" width="640">
                      <tbody>
                        <tr>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top;" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                <td style="width:30px;background-color: #fff !important"> </td>
                                <td style="padding-top:0px;padding-bottom:0px;border-top:0px;border-bottom:0px;width:580px;">
                                  <table border="0" cellpadding="0" cellspacing="0" class="divider_block" width="100%">
                                    <tr>
                                      <td>
                                        <div align="center">
                                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                              <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;"><span> </span></td>
                                            </tr>
                                          </table>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                      <td style="width:100%;padding-right:0px;padding-left:0px;">
                                        <div align="center" style="line-height:10px"><img alt="Avatar" src="images/photo1.png" style="display: block; height: auto; border: 0; width: 72px; max-width: 100%;" width="72"/></div>
                                      </td>
                                    </tr>
                                  </table>
                                  <table border="0" cellpadding="0" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                                    <tr>
                                      <td style="padding:10px 16px 10px 10px;">
                                        <div style="font-family: Verdana, sans-serif">
                                          <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 14.399999999999999px; line-height: 1.2;">
                                            <p style="margin: 0; font-size: 16px; text-align: center;color:#04e8ff;font-size:22px;"><strong>Samuel Thibault</strong></p>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                  <table border="0" cellpadding="0" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                                    <tr>
                                      <td style="padding-bottom:20px;padding-left:30px;padding-right:30px;padding-top:20px;">
                                        <div style="font-family: Verdana, sans-serif">
                                          <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 18px; color: #fff; line-height: 1.5;">
                                            <p id="message" style="margin: 0; padding: 0 15px; text-align: left; color:#fff !important; mso-line-height-alt: 22.5px; font-size:15px;">{!! $message->message !!}</p>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                      <td style="text-align:right;padding-right:50px;padding-bottom:15px;padding-left:50px;">
                                        <div align="right">
                                          <a href="http://datavis.samuel-thibault.fr" target="_blank"
                                          style="box-sizing:border-box; padding:8px 16px; border:8px 16px solid #fff;
                                          border-radius:4px; color:#013c59; background-color:#fff !important;
                                          display:inline-block; overflow:hidden; text-decoration:none;
                                          text-align:center; vertical-align:middle;
                                          -webkit-user-select:none;
                                          -moz-user-select:none;
                                          -ms-user-select:none;
                                          user-select:none;
                                          font-weight:600; font-size:20px; line-height:1.5;
                                          font-family:'Lucida Sans Unicode'; mso-border-alt:none; word-break:keep-all;">{{ __('Back to') }} {{ config('app.name', 'Laravel') }}</a>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                                <td style="width:30px;background-color: #fff !important"> </td>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" style="background-color: #fff !important; color: #000000;" width="640">
                      <tbody>
                        <tr>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top; border:0px" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                <td style="text-align:center;padding: 40px 15px;">
                                  <div align="center">
                                    <a href="http://datavis.samuel-thibault.fr" target="_blank"
                                    style="box-sizing:border-box; padding:8px 16px; border:8px 16px solid #013c59;
                                    border-radius:4px; color:#fff; background-color:#013c59 !important;
                                    display:inline-block; overflow:hidden; text-decoration:none;
                                    text-align:center; vertical-align:middle;
                                    -webkit-user-select:none;
                                    -moz-user-select:none;
                                    -ms-user-select:none;
                                    user-select:none;
                                    font-weight:600; font-size:20px; line-height:1.5;
                                    font-family:'Lucida Sans Unicode'; mso-border-alt:none; word-break:keep-all;">Portfolio</a>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" style="background-color: #000000; color: #000000;" width="640">
                      <tbody>
                        <tr>
                          <th class="column" style="font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border:0px" width="100%">
                            <table border="0" cellpadding="0" cellspacing="0" class="divider_block" width="100%">
                              <tr>
                                <td>
                                  <div align="center">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tr>
                                        <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 4px solid #04E8FF;"><span> </span></td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tr>
                                <td style="width:100%;padding-right:0px;padding-left:0px;">
                                  <div align="center" style="line-height:10px"><img alt="Logo" src="http://datavis.samuel-thibault.fr/storage/img/logos/mDic6DI5asAfo4fLvivqVNU7xHmHqKUqnqV8IKC6.png" style="display: block; height: auto; border: 0; width: 80px; max-width: 100%;" width="80"/></div>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                              <tr>
                                <td>
                                  <div style="font-family: Verdana, sans-serif">
                                    <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 18px; color: #013c59 !important; line-height: 1.5;">
                                      <p style="margin: 0; font-size: 26px; text-align: center; mso-line-height-alt: 39px;color:#fff;"><strong>{{ config('app.name', 'Laravel') }}</strong></p>
                                      <p style="margin: 0; font-size: 14px; text-align: center; color:#6c757d;"><em>By Samuel Thibault</em></p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="15" cellspacing="0" class="social_block" width="100%">
                              <tr>
                                <td>
                                  <table align="center" border="0" cellpadding="0" cellspacing="0" class="social-table" width="208px">
                                    <tr>
                                      <td style="padding:0 10px 0 10px;"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="images/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
                                      <td style="padding:0 10px 0 10px;"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="images/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td>
                                      <td style="padding:0 10px 0 10px;"><a href="https://instagram.com/" target="_blank"><img alt="Instagram" height="32" src="images/instagram2x.png" style="display: block; height: auto; border: 0;" title="Instagram" width="32"/></a></td>
                                      <td style="padding:0 10px 0 10px;"><a href="https://www.linkedin.com/" target="_blank"><img alt="LinkedIn" height="32" src="images/linkedin2x.png" style="display: block; height: auto; border: 0;" title="LinkedIn" width="32"/></a></td>
                                    </tr>
                                  </table>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                              <tr>
                                <td style="padding:10px 40px;">
                                  <div style="font-family: Verdana, sans-serif">
                                    <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 18px; color: #555555; line-height: 1.5;">
                                      <p style="margin: 0; font-size: 14px; text-align: left; mso-line-height-alt: 18px;"><span style="color:#95979c;font-size:12px;">Etiam quis tempus ex. Sed vitae ipsum suscipit, ultricies odio vitae, suscipit massa. Sed tempus ipsum eget diam aliquam maximus. Cras accumsan urna vel rutrum lobortis. Maecenas tristique purus vel ex tempor consequat. Curabitur dui massa, congue sed sem at, rhoncus imperdiet sem. Fusce ac orci fermentum, malesuada dolor a, cursus augue. Quisque porttitor sapien arcu, quis iaculis nisi faucibus eget. Vestibulum eu velit rhoncus, aliquam ante eget, tristique diam dui massa, congue sed sem at, rhoncus usce ac orci fermentum.</span></p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="divider_block" width="100%">
                              <tr>
                                <td style="padding:10px 30px;">
                                  <div align="center">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tr>
                                        <td class="divider_inner" style="font-size: 1px; line-height: 1px; border-top: 1px solid #fff;"><span> </span></td>
                                      </tr>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="text_block" style="word-break: break-word;" width="100%">
                              <tr>
                                <td style="padding:20px 40px;">
                                  <div style="font-family: Verdana, sans-serif">
                                    <div style="font-size: 12px; font-family: 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Geneva, Verdana, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #fff; line-height: 1.2;">
                                      <p style="margin: 0; font-size: 14px; text-align: left;"><span style="color:#95979c;font-size:12px;"><span style="color:#04e8ff;">Samuel Thibault</span> <span style="color:#fff;">Copyright &copy; 2021</span></span></p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table><!-- End -->
  </body>
  </html>

@endsection
