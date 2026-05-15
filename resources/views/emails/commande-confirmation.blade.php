@component('mail::message')
# Merci pour votre commande !

Bonjour **{{ $commande->user->first_name }}**,

Votre commande n°**{{ $commande->id }}** a bien été enregistrée avec le statut **En attente**.

@component('mail::table')
| Produit | Option | Prix |
|:--------|:-------|-----:|
@foreach($commande->products as $ligne)
| {{ $ligne['name'] }} | {{ $ligne['option'] ?? '—' }} | {{ number_format($ligne['price'], 2) }} € |
@endforeach
| **Total** | | **{{ number_format($commande->total_price, 2) }} €** |
@endcomponent

**Adresse de livraison :**
{{ $commande->shipping_address }},
{{ $commande->shipping_postal_code }} {{ $commande->shipping_city }},
{{ $commande->shipping_country }}

Merci de votre confiance !

@component('mail::button', ['url' => url('/')])
Retour à la boutique
@endcomponent

© {{ date('Y') }} InnovShop
@endcomponent