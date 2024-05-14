<?php
    $dato = get_post_meta($post->ID, 'jf-booking_dato', true);
    $tid = get_post_meta($post->ID, 'jf-booking_tid', true);
    $navn = get_post_meta($post->ID, 'jf-booking_navn', true);
    $email = get_post_meta($post->ID, 'jf-booking_email', true);
    $telefon = get_post_meta($post->ID, 'jf-booking_telefon', true);
    $behandling = get_post_meta($post->ID, 'jf-booking_behandling', true);
  
?>

<table class="form-table jf-booking-metabox">
  <input type="hidden" name="jf-booking_nonce" value="<?php echo wp_create_nonce( "jf-booking_nonce"); ?>">
  <tr>
    <th>
      <label for="jf-booking_dato">Dato</label>
    </th>
    <td>
      <input 
      type="date" 
      name="jf-booking_dato" 
      id="jf-booking_dato" 
      class="regular-text jf-booking_dato" 
      value="<?php echo (isset ( $dato )) ? esc_textarea($dato) : ''; ?>"
      required
      >
    </td>
  </tr>
  <tr>
    <th>
      <label for="jf-booking_tid">Tidspunkt</label>
    </th>
    <td>
      <input 
      type="time" 
      name="jf-booking_tid" 
      id="jf-booking_tid" 
      class="regular-text jf-booking_tid" 
      value="<?php echo (isset ($tid )) ? esc_textarea($tid) : ''; ?>"
      required
      >
    </td>
  </tr>
  <tr>
    <th>
      <label for="jf-booking_navn">Navn</label>
    </th>
    <td>
      <input 
      type="text" 
      name="jf-booking_navn" 
      id="jf-booking_navn" 
      class="regular-text jf-booking_navn" 
      value="<?php echo (isset ($navn)) ? esc_textarea($navn) : ''; ?>"
      required
      >
    </td>
  </tr>
  <tr>
    <th>
      <label for="jf-booking_email">Email</label>
    </th>
    <td>
      <input 
      type="email" 
      name="jf-booking_email" 
      id="jf-booking_email" 
      class="regular-text jf-booking_email" 
      value="<?php echo (isset ($email)) ? esc_textarea($email) : '';?>"
      required
      >
    </td>
  </tr>
  <tr>
    <th>
      <label for="jf-booking_telefon">Telefon</label>
    </th>
    <td>
      <input 
      type="tel" 
      name="jf-booking_telefon" 
      id="jf-booking_telefon" 
      class="regular-text jf-booking_telefon" 
      value="<?php echo (isset ($telefon)) ? esc_textarea($telefon) : ''; ?>"
      required
      >
    </td>
  </tr>
  <tr>
    <th>
        <label for="jf-booking_behandling">Behandling</label>
    </th>
    <td>
        <select 
        name="jf-booking_behandling" 
        id="jf-booking_behandling"
        class="regular-text jf-booking_behandling"
        required
        >
            <option value="farvning" <?php selected( $behandling, 'farvning' ); ?>>Farvning</option>
            <option value="farveKlip" <?php selected( $behandling, 'farveKlip' ); ?>>Farvning og Klip</option>
            <option value="børneKlip" <?php selected( $behandling, 'børneKlip' ); ?>>Børne Klip</option>
        </select>
    </td>
</tr>


</table>