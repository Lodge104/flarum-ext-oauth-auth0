import app from 'flarum/admin/app';
import Auth0OAuthPage from './components/Auth0OAuthPage';

app.initializers.add('lodge104/oauth-auth0', () => {
  app.extensionData.for('lodge104-oauth-auth0').registerPage(Auth0OAuthPage);
});
