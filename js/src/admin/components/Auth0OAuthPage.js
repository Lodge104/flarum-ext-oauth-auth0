import app from 'flarum/admin/app';
import ExtensionPage from 'flarum/admin/components/ExtensionPage';
import LinkButton from 'flarum/common/components/LinkButton';

export default class Auth0OAuthPage extends ExtensionPage {
  oninit(vnode) {
    super.oninit(vnode);
  }

  content() {
    return [
      <div className="container">
        <div className="Auth0OAuthSettingsPage">
          <br />
          <LinkButton className="Button" href={app.route('extension', { id: 'fof-oauth' })}>
            {app.translator.trans('fof-oauth.admin.configure_button_label')}
          </LinkButton>
        </div>
      </div>,
    ];
  }
}
